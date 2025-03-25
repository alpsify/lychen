<?php

namespace App\Doctrine\Listener;

use App\Entity\LandMember;
use App\Entity\LandMemberInvitation;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Exception;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[AsEntityListener(event: Events::prePersist, entity: LandMemberInvitation::class)]
#[AsEntityListener(event: Events::prePersist, entity: LandMember::class)]
final readonly class LandMemberInvitationValidateListener
{
    public function __construct(private ValidatorInterface $validator)
    {
    }

    /**
     * @throws Exception
     */
    public function __invoke(LandMemberInvitation|LandMember $object, LifecycleEventArgs $event): void
    {
        $errors = $this->validator->validate($object);

        if (count($errors) > 0) {
            throw new Exception('Validation failed');
        }
    }
}
