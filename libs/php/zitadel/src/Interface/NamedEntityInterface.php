<?php

namespace Lychen\UtilZitadelBundle\Interface;

interface NamedEntityInterface
{
    public function getGivenName(): ?string;

    public function setGivenName(?string $givenName): static;

    public function getFamilyName(): ?string;

    public function setFamilyName(?string $familyName): static;
}
