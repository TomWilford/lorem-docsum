<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Factory;

use TomWilford\LoremDocsum\Domain\FileOutputType;
use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Factory\ChunkEstimatorFactory;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\Interface\ContentProvider;
use TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Concrete\DocxFileOutputStrategy;
use TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Concrete\TxtFileOutputStrategy;
use TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Interface\FileOutputStrategy;

class FileOutputStrategyFactory
{
    public function __construct(
        private readonly ContentProvider $contentProvider,
        private readonly ChunkEstimatorFactory $chunkEstimatorFactory
    ) {
    }

    public function create(FileOutputType $fileOutputType): FileOutputStrategy
    {
        $estimator = $this->chunkEstimatorFactory->create($fileOutputType);

        return match ($fileOutputType) {
            FileOutputType::DOCX => new DocxFileOutputStrategy($this->contentProvider, $estimator),
            FileOutputType::TXT => new TxtFileOutputStrategy($this->contentProvider, $estimator),
            default => throw new \InvalidArgumentException('Invalid file output type'),
        };
    }
}
