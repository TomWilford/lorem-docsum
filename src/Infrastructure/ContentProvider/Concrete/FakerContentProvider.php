<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\ContentProvider\Concrete;

use Faker\Generator;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\Interface\ContentProvider;

class FakerContentProvider implements ContentProvider
{
    public function __construct(private Generator $faker)
    {
    }

    /**
     * @param int $length
     * @return string
     */
    public function getContent(int $length = 100): string
    {
        if ($length <= $this->getBlockSize()) {
            return $this->faker->realText($this->getRealTextMinimumLength($length));
        }

        $blocks = $length / $this->getBlockSize();
        $content = '';
        foreach (range(1, $blocks) as $block) {
            $content .= $this->faker->realText($this->getBlockSize()) . "\n\n";
        }

        return $content;
    }

    /**
     * realText requires a minimum length of 10
     */
    private function getRealTextMinimumLength(int $length): int
    {
        return max($length, 10);
    }

    private function getBlockSize(): int
    {
        return rand(600, 800);
    }
}
