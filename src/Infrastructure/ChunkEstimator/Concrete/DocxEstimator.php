<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Concrete;

use TomWilford\LoremDocsum\Domain\FileOutputType;
use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Interface\ChunkEstimator;

class DocxEstimator implements ChunkEstimator
{
    public function getEstimate(int $targetBytes, int $currentRawBytes, int $lastActualBytes = 0): int
    {
        $remainingActual = max(0, $targetBytes - $lastActualBytes);
        if ($lastActualBytes <= 0 || $currentRawBytes <= 0) {
            return (int) ($remainingActual * FileOutputType::DOCX->getCompressionRatio());
        }

        $measuredRatio = $currentRawBytes / $lastActualBytes;

        return (int) ($remainingActual * $measuredRatio);
    }
}
