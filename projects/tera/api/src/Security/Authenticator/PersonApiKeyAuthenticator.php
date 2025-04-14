<?php

namespace App\Security\Authenticator;

use App\Entity\PersonApiKey;
use App\Security\JWT\JWTDecoder;
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

class PersonApiKeyAuthenticator extends AbstractAuthenticator
{
    public const string HEADER_ATTRIBUTE = 'tera-personal-token';

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly JWTDecoder             $JWTDecoder)
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

        if (!str_starts_with($token, PersonApiKey::PREFIX)) {
            throw new CustomUserMessageAuthenticationException('Invalid token format : missing prefix.');
        }

        try {
            $token = substr($token, strlen(PersonApiKey::PREFIX));
            $decodedToken = $this->JWTDecoder->decode($token);
        } catch (Exception $e) {
            throw new CustomUserMessageAuthenticationException('Invalid token format : ' . $e->getMessage());
        }

        return new SelfValidatingPassport(new UserBadge($decodedToken->jti));
    }

    public function onAuthenticationSuccess(Request        $request,
                                            TokenInterface $token,
                                            string         $firewallName): ?Response
    {
        /** @var PersonApiKey $personApiKey */
        $personApiKey = $token->getUser();
        $personApiKey->setLastUsedDate(new DateTime());
        $this->entityManager->persist($personApiKey);
        $this->entityManager->flush();

        return null;
    }

    public function onAuthenticationFailure(Request                 $request,
                                            AuthenticationException $exception): ?Response
    {
        $data = [
            // you may want to customize or obfuscate the message first
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData()),

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    //    public function start(Request $request, AuthenticationException $authException = null): Response
    //    {
    //        /*
    //         * If you would like this class to control what happens when an anonymous user accesses a
    //         * protected page (e.g. redirect to /login), uncomment this method and make this class
    //         * implement Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface.
    //         *
    //         * For more details, see https://symfony.com/doc/current/security/experimental_authenticators.html#configuring-the-authentication-entry-point
    //         */
    //    }
}
