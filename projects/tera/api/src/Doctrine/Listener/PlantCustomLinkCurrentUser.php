<?php

namespace App\Doctrine\Listener;

use App\Entity\Person;
use App\Entity\PlantCustom;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Symfony\Bundle\SecurityBundle\Security;

#[AsEntityListener(event: Events::prePersist, entity: PlantCustom::class)]
final readonly class PlantCustomLinkCurrentUser
{
    public function __construct(private Security $security)
    {
    }

    public function __invoke(PlantCustom $plantCustom): void
    {
        if ($plantCustom->getPerson()) {
            return;
        }

        $person = $this->security->getUser();

        if (!$person instanceof Person) {
            return;
        }

        $plantCustom->setPerson($person);
    }
}
