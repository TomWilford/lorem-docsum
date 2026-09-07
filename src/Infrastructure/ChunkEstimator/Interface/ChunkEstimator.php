<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Interface;

interface ChunkEstimator
{
    public function getEstimate(int $targetBytes, int $currentRawBytes, int $lastActualBytes = 0): int;
}
