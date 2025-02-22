<?php

namespace App\Security\Interface;

use App\Entity\Land;

interface LandAwareInterface
{
    public function getLand(): ?Land;
}
