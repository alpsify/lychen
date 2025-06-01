<?php

namespace Lychen\UtilZitadelBundle\Interface;

interface AuthIdIdentifiedInterface
{
    public function getAuthId(): ?string;

    public function getId(): ?int;

    public function setAuthId(string $authId): static;
}
