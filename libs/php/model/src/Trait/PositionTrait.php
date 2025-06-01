<?php

namespace Lychen\UtilModel\Trait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait PositionTrait
{
    #[Gedmo\SortablePosition()]
    #[ORM\Column(type: Types::INTEGER, nullable: false)]
    private int $position = 0;

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }
}
