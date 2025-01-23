<?php

namespace App\EventListener;

use App\Entity\Land;
use App\Entity\LandMember;
use App\Entity\Person;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\SecurityBundle\Security;

#[AsEntityListener(event: Events::postPersist, method: 'postPersist', entity: Land::class)]
readonly class LandCreationOwnerSetup
{
    public function __construct(private LoggerInterface $logger, private Security $security)
    {
    }

    public function postPersist(Land $land, LifecycleEventArgs $event): void
    {
        $person = $this->security->getUser();
        if (!$person instanceof Person) {
            return;
        };

        $landMember = (new LandMember())->setLand($land)->setPerson($person)->setOwner(true);

        $em = $event->getObjectManager();
        $em->persist($landMember);
        $em->flush();

        $this->logger->info("User " . $person->getUserIdentifier() . " has created a land", ['land_id' => $land->getId()]);
    }
}
