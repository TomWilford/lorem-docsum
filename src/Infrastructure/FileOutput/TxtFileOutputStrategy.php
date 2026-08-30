<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\FileOutput;

use SplFileObject;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\ContentProvider;

class TxtFileOutputStrategy implements FileOutputStrategy
{
    private SplFileObject $fileHandle;
    private int $targetSize = 0;

    public function __construct(private ContentProvider $contentProvider)
    {
    }

    public function init(string $outputName, int $targetBytes): void
    {
        $this->fileHandle = new SplFileObject($outputName, 'a');
        $this->targetSize = $targetBytes;
    }

    public function write(): void
    {
        $this->fileHandle->fwrite(
            $this->contentProvider->getContent()
        );
    }

    public function check(): bool
    {
        return $this->fileHandle->getSize() >= $this->targetSize;
    }
}
