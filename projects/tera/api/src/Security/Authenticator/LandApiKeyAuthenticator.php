<?php

namespace App\Security\Authenticator;

use App\Entity\LandApiKey;
use App\Security\JWT\JWTDecoder;
use App\Security\JWT\JWTValidator;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

class LandApiKeyAuthenticator extends AbstractAuthenticator
{
    public const string HEADER_ATTRIBUTE = 'tera-land-token';

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly JWTDecoder             $JWTDecoder,
                                private readonly JWTValidator           $JWTValidator)
    {
    }

    public function supports(Request $request): ?bool
    {
        return $request->headers->has(self::HEADER_ATTRIBUTE);
    }

    public function authenticate(Request $request): Passport
    {
        $token = $request->headers->get(self::HEADER_ATTRIBUTE);

        if (null === $token) {
            throw new CustomUserMessageAuthenticationException(sprintf('Authentication failed: Missing required header "%s"',
                self::HEADER_ATTRIBUTE));
        }

        if (!str_starts_with($token, LandApiKey::PREFIX)) {
            throw new CustomUserMessageAuthenticationException('Invalid token format : missing prefix.');
        }

        try {
            $token = substr($token, strlen(LandApiKey::PREFIX));
            $decodedToken = $this->JWTDecoder->decode($token);
            if ($this->JWTValidator->validate($decodedToken)) {
                throw new Exception();
            }
        } catch (Exception $e) {
            throw new CustomUserMessageAuthenticationException('Invalid token');
        }

        return new SelfValidatingPassport(new UserBadge($decodedToken->jti));
    }

    public function onAuthenticationSuccess(Request        $request,
                                            TokenInterface $token,
                                            string         $firewallName): ?Response
    {
        /** @var LandApiKey $landApiKey */
        $landApiKey = $token->getUser();
        $landApiKey->setLastUsedDate(new DateTime());
        $this->entityManager->persist($landApiKey);
        $this->entityManager->flush();

        return null;
    }

    public function onAuthenticationFailure(Request                 $request,
                                            AuthenticationException $exception): ?Response
    {
        $data = [
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData()),
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }
}
