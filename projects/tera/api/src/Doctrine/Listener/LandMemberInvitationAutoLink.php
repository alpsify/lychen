<?php

namespace App\Doctrine\Listener;

use App\Entity\LandMemberInvitation;
use App\Entity\Person;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

#[AsEntityListener(event: Events::postPersist, method: 'onNewPerson', entity: Person::class)]
#[AsEntityListener(event: Events::postPersist, method: 'onNewMemberInvitation', entity: LandMemberInvitation::class)]
class LandMemberInvitationAutoLink
{
    public function onNewPerson(Person $person, LifecycleEventArgs $event): void
    {
        $entityManager = $event->getObjectManager();
        $landMemberInvitationRepository = $entityManager->getRepository(LandMemberInvitation::class);

        $landMemberInvitations = $landMemberInvitationRepository->findBy(['email' => $person->getEmail()]);

        foreach ($landMemberInvitations as $landMemberInvitation) {
            $landMemberInvitation->setPerson($person);
            $entityManager->persist($landMemberInvitation);
        }

        $entityManager->flush();
    }

    public function onNewMemberInvitation(LandMemberInvitation $landMemberInvitation, LifecycleEventArgs $event): void
    {
        $entityManager = $event->getObjectManager();
        $personRepository = $entityManager->getRepository(Person::class);

        $person = $personRepository->findOneBy(['email' => $landMemberInvitation->getEmail()]);

        if ($person) {
            $landMemberInvitation->setPerson($person);
            $entityManager->persist($landMemberInvitation);
            $entityManager->flush();
        }
    }
}
