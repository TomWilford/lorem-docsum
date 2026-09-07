<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Factory;

use TomWilford\LoremDocsum\Domain\FileOutputType;
use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Concrete\DirectByteSizeEstimator;
use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Concrete\DocxEstimator;
use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Interface\ChunkEstimator;

class ChunkEstimatorFactory
{
    public function create(FileOutputType $fileOutputType): ChunkEstimator
    {
        return match ($fileOutputType) {
            FileOutputType::DOCX => new DocxEstimator(),
            default => new DirectByteSizeEstimator()
        };
    }
}
