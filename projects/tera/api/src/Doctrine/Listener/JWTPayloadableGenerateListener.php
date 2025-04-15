<?php

namespace App\Doctrine\Listener;

use App\Entity\LandApiKey;
use App\Entity\PersonApiKey;
use App\Security\JWT\JWTEncoder;
use App\Security\JWT\JWTPayloadable;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::prePersist, entity: PersonApiKey::class)]
#[AsEntityListener(event: Events::prePersist, entity: LandApiKey::class)]
readonly class JWTPayloadableGenerateListener
{
    public function __construct(private JWTEncoder $JWTEncoder)
    {
    }

    public function __invoke(JWTPayloadable $subject): void
    {
        $payload = $this->JWTEncoder->preparePayload($subject);
        $subject->setToken($this->JWTEncoder->encode($payload));
    }
}
