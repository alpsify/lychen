<?php

namespace App\Security;

use App\Entity\Person;
use App\Repository\PersonRepository;
use App\Service\Zitadel\OpenIDConnect;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

readonly class ZitadelUserProvider implements UserProviderInterface
{

    public function __construct(private LoggerInterface $logger, private OpenIDConnect $openIDConnect, private PersonRepository $personRepository, private EntityManagerInterface $entityManager)
    {
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof Person) {
            throw new UnsupportedUserException('Invalid user class ' . get_class($user));
        }

        $refreshedUser = $this->personRepository->find($user->getId());
        if (!$refreshedUser) {
            throw new UserNotFoundException('User with id ' . $user->getId() . ' not found.');
        }
        return $refreshedUser;
    }

    public function supportsClass(string $class): bool
    {
        return Person::class === $class || is_subclass_of($class, Person::class);
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $response = $this->openIDConnect->introspectToken($identifier);
        $this->ensureUserExists($response['sub'], $response);

        $user = $this->personRepository->findOneByAuthId($response['sub']);

        if (null === $user) {
            throw new UserNotFoundException('User with id ' . $identifier . ' not found.');
        }

        return $user;
    }

    public function ensureUserExists(string $userIdentifier, array $userData): void
    {
        $this->logger->debug("OIDC User Data", [
            'sub' => $userData['sub'],
            'given_name' => $userData['given_name'],
            'family_name' => $userData['family_name'],
            #'roles' => $userData->getUserData(self::ROLES_CLAIM),
        ]);
        try {
            $user = $this->personRepository->findOneByAuthId($userIdentifier);
            if (!$user) {
                $user = new Person();
                $this->entityManager->persist($user);
            }
            $this->updateUserEntity($user, $userData);
            $this->entityManager->flush();
        } catch (\Throwable $th) {
            throw new \Exception('Cannot create user', previous: $th);
        }
    }

    private function updateUserEntity(Person &$user, array $userData): void
    {
        $user->setAuthId($userData['sub']);
        $user->setEmail($userData['email']);
        $user->setGivenName($userData['given_name']);
        $user->setFamilyName($userData['family_name']);
        #$user->setRoles($this->parseZitadelRoles($userData->getUserDataArray(self::ROLES_CLAIM)));
    }
}
