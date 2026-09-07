<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Tests\TestCase\Infrastructure\ContentProvider\Concrete;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\Concrete\FakerContentProvider;

#[CoversClass(FakerContentProvider::class)]
class FakerContentProviderTest extends TestCase
{
    private Generator $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();
    }

    public function test_getContent_returns_string_of_text_that_matches_the_given_length_below_the_block_size()
    {
        $sut = new FakerContentProvider($this->faker);
        $result = $sut->getContent(150);

        $this->assertLessThanOrEqual(150, strlen($result));
    }

    public function test_getContent_returns_string_of_text_matching_the_given_length_above_the_block_size()
    {
        $sut = new FakerContentProvider($this->faker);
        $result = $sut->getContent(1500);

        $this->assertLessThanOrEqual(1500, strlen($result));
    }
}
