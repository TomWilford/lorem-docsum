<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Concrete;

use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Interface\ChunkEstimator;

class DirectByteSizeEstimator implements ChunkEstimator
{
    public function getEstimate(int $targetBytes, int $currentRawBytes, int $lastActualBytes = 0): int
    {
        return max(0, $targetBytes - $currentRawBytes);
    }
}
