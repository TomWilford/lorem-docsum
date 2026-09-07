<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Concrete;

use SplFileObject;
use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Interface\ChunkEstimator;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\Interface\ContentProvider;
use TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Interface\FileOutputStrategy;

class TxtFileOutputStrategy implements FileOutputStrategy
{
    private SplFileObject $fileHandle;
    private int $targetSize = 0;
    private int $currentSize = 0;

    public function __construct(
        private ContentProvider $contentProvider,
        private ChunkEstimator $chunkEstimator
    ) {
    }

    public function init(string $outputName, int $targetBytes): void
    {
        $this->fileHandle = new SplFileObject($outputName, 'a');
        $this->targetSize = $targetBytes;
    }

    public function write(): void
    {
        $chunkSize = $this->chunkEstimator->getEstimate($this->targetSize, $this->currentSize);

        $this->fileHandle->fwrite(
            $this->contentProvider->getContent($chunkSize)
        );
    }

    public function check(): bool
    {
        $this->currentSize = $this->fileHandle->getSize();
        return $this->currentSize >= $this->targetSize;
    }
}
