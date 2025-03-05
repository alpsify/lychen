<?php

namespace Lychen\UtilZitadelBundle\Interface;

interface HasRolesInterface
{
    public function getRoles(): array;

    public function setRoles(array $roles): static;
}
