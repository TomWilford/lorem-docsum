<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\FileOutput;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\ContentProvider;

class DocxFileOutputStrategy implements FileOutputStrategy
{
    private PhpWord $fileHandle;
    private string $outputName;
    private int $targetSize = 0;

    public function __construct(private ContentProvider $contentProvider)
    {
    }

    public function init(string $outputName, int $targetBytes): void
    {
        $this->outputName = $outputName;
        $this->targetSize = $targetBytes;
        $this->fileHandle = new PhpWord();
        $this->fileHandle->addSection();
    }

    public function write(): void
    {
        $section = $this->fileHandle->getSection(0);
        $section->addText(
            $this->contentProvider->getContent()
        );
    }

    public function check(): bool
    {
        $writer = IOFactory::createWriter($this->fileHandle);
        $writer->save($this->outputName);

        return filesize($this->outputName) >= $this->targetSize;
    }
}
