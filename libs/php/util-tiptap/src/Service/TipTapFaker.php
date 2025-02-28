<?php

namespace Lychen\UtilTiptap\Service;

use function Zenstruck\Foundry\faker;

class TipTapFaker
{
    public static function randomContent(): ?array
    {
        return faker()->boolean() ? TipTapFaker::sentences() : TipTapFaker::paragraphs();
    }

    public static function sentences($min = 1, $max = 3, $random = true): ?array
    {
        return (!$random || faker()->boolean(70)) ? [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => faker()->sentences(faker()->biasedNumberBetween($min, $max), asText: true),
                        ],
                    ],
                ],
            ],
        ] : null;
    }

    public static function paragraphs($min = 1, $max = 3, $random = true): ?array
    {
        return (!$random || faker()->boolean(70)) ? [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => faker()->paragraph(faker()->biasedNumberBetween($min, $max)),
                        ],
                    ],
                ],
            ],
        ] : null;
    }
}
