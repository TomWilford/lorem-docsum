<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Tests\TestCase\Infrastructure\ChunkEstimator\Concrete;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Concrete\DocxEstimator;

#[CoversClass(DocxEstimator::class)]
class DocxEstimatorTest extends TestCase
{
    public function test_getEstimate_returns_value_multiplied_by_compression_ratio(): void
    {
        $sut = new DocxEstimator();

        $result = $sut->getEstimate(200, 100);

        $this->assertEquals(350, $result);
    }

    public function test_getEstimate_returns_zero_for_negative_difference(): void
    {
        $sut = new DocxEstimator();

        $result = $sut->getEstimate(100, 200);

        $this->assertEquals(0, $result);
    }

    public function test_getEstimate_returns_zero_for_matching_difference(): void
    {
        $sut = new DocxEstimator();

        $result = $sut->getEstimate(100, 100);

        $this->assertEquals(0, $result);
    }
}
