<?php

namespace Lychen\UtilZitadelBundle\Interface;

interface HasEmailInterface
{
    public function getEmail(): ?string;

    public function setEmail(?string $email): static;
}
