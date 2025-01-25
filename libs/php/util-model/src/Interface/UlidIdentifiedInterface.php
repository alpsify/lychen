<?php

namespace Lychen\UtilModel\Interface;

use Symfony\Component\Uid\Ulid;

interface UlidIdentifiedInterface
{
    public function getUlid(): Ulid;

    public function setUlid(Ulid $ulid): self;
}
