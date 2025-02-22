<?php

namespace App\Security\Helper;

use App\Entity\Land;
use App\Entity\LandMember;
use App\Entity\Person;
use App\Repository\LandMemberRepository;
use App\Security\Interface\LandAwareInterface;
use Lychen\UtilModel\Interface\UlidIdentifiedInterface;
use PHPUnit\Framework\Exception;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\SecurityBundle\Security;

class PermissionManager
{
    public const string SEPARATOR = '_';

    public function __construct(private readonly LoggerInterface $logger, private readonly LandMemberRepository $landMemberRepository, private readonly Security $security)
    {

    }

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

    public function getLandMember(Land $land, Person $person): LandMember
    {
        $landMember = $this->landMemberRepository->findOneBy(['land' => $land, 'person' => $person]);
        if (null === $landMember) {
            throw new Exception('Unable to find LandMember related to the authenticated user.');
        }
        return $landMember;
    }

    public function landMemberHasPermission(string $permission, LandMember $landMember): bool
    {
        if ($landMember->isOwner()) {
            return true;
        }
        return in_array($permission, $this->getLandMemberEffectivePermissions($landMember));
    }

    public function getLandMemberEffectivePermissions(LandMember $landMember): array
    {
        $roles = $landMember->getLandRoles();
        $effectiveRights = [];
        foreach ($roles as $role) {
            $effectiveRights = array_merge($effectiveRights, $role->getPermissions());
        }

        return array_unique($effectiveRights);
    }

    public function buildPermissionFromContext(string $action, mixed $subject): string
    {
        $entityName = strtolower((new ReflectionClass($subject))->getShortName());

        // Construire la permission complète, par exemple "read_land" ou "write_task"
        return sprintf('%s%s%s', $entityName, self::SEPARATOR, $action);
    }
}
