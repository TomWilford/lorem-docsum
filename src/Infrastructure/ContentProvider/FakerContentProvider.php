<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\ContentProvider;

use Faker\Generator;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\ContentProvider;

class FakerContentProvider implements ContentProvider
{
    public function __construct(private Generator $faker)
    {
    }

    public function getContent(): string
    {
        return $this->faker->realText(rand(100, 200));
    }
}
