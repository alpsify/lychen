<?php

namespace App\Security\JWT;

interface JWTPayloadable
{
    public function getJWTPayload(): array;

    public function setJti(string $jti): static;

    public function setToken(?string $token): static;
}
