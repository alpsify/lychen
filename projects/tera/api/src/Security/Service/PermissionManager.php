<?php

namespace App\Security\Service;

use App\Entity\Land;
use App\Entity\LandMember;
use App\Entity\Person;
use App\Repository\LandMemberRepository;
use App\Security\Interface\LandAwareInterface;
use JetBrains\PhpStorm\Deprecated;
use Lychen\UtilModel\Interface\UlidIdentifiedInterface;
use PHPUnit\Framework\Exception;
use Psr\Log\LoggerInterface;
use ReflectionClass;
use Symfony\Bundle\SecurityBundle\Security;

#[Deprecated]
class PermissionManager
{
    public const string SEPARATOR = '_';

    public function __construct(private readonly LoggerInterface $logger, private readonly LandMemberRepository $landMemberRepository, private readonly Security $security)
    {

    }

    #[Deprecated]
    public function can(string $permission, LandAwareInterface&UlidIdentifiedInterface $subject): bool
    {
        try {
            $landMember = $this->getAuthenticatedLandMember($subject->getLand());
        } catch (Exception $exception) {
            $this->logger->error("Not authorized to " . $permission . " on object #" . $subject->getUlid(), ["exception" => $exception->getMessage()]);
            return false;
        }

        return $this->landMemberHasPermission($permission, $landMember);
    }

    #[Deprecated]
    public function getAuthenticatedLandMember(Land $land): LandMember
    {
        $currentUser = $this->security->getUser();
        if (null === $currentUser) {
            throw new Exception('Authenticated user is null.');
        }

        if (!$currentUser instanceof Person) {
            throw new Exception('Authenticated user is not a person.');
        }

        return $this->getLandMember($land, $currentUser);
    }

    #[Deprecated]
    public function getLandMember(Land $land, Person $person): LandMember
    {
        $landMember = $this->landMemberRepository->findOneBy(['land' => $land, 'person' => $person]);
        if (null === $landMember) {
            throw new Exception('Unable to find LandMember related to the authenticated user.');
        }
        return $landMember;
    }

    #[Deprecated]
    public function landMemberHasPermission(string $permission, LandMember $landMember): bool
    {
        if ($landMember->isOwner()) {
            return true;
        }

        return in_array($permission, $this->getLandMemberEffectivePermissions($landMember));
    }

    #[Deprecated]
    public function getLandMemberEffectivePermissions(LandMember $landMember): array
    {
        $roles = $landMember->getLandRoles();
        $effectiveRights = [];
        foreach ($roles as $role) {
            if ($role->getPermissions()) {
                $effectiveRights = array_merge($effectiveRights, $role->getPermissions());
            }
        }

        return array_unique($effectiveRights);
    }

    #[Deprecated]
    public function buildPermissionFromContext(string $action, mixed $subject): string
    {
        $entityName = strtolower((new ReflectionClass($subject))->getShortName());

        return sprintf('%s%s%s', $entityName, self::SEPARATOR, $action);
    }
}
