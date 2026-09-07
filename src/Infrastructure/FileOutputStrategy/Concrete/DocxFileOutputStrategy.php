<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Concrete;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Interface\ChunkEstimator;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\Interface\ContentProvider;
use TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Interface\FileOutputStrategy;

class DocxFileOutputStrategy implements FileOutputStrategy
{
    private string $outputName;
    private int $targetSize = 0;
    private int $generatedBytes = 0;
    private string $textBuffer = '';
    private int $lastActualBytes = 0;
    private int $lastAttemptRawBytes = 0;
    private const MIN_CHUNK = 8192;

    public function __construct(
        private readonly ContentProvider $contentProvider,
        private readonly ChunkEstimator $estimator
    ) {}

    public function init(string $outputName, int $targetBytes): void
    {
        $this->outputName = $outputName;
        $this->targetSize = $targetBytes;
        $this->generatedBytes = 0;
        $this->textBuffer = '';
        $this->lastActualBytes = 0;
        $this->lastAttemptRawBytes = 0;
    }

    public function write(): void
    {
        $nextChunkEstimate = max(
            self::MIN_CHUNK,
            $this->estimator->getEstimate($this->targetSize, $this->generatedBytes, $this->lastActualBytes)
        );
        $this->textBuffer .= $this->contentProvider->getContent($nextChunkEstimate) . "\n\n";
        $this->generatedBytes = strlen($this->textBuffer);
    }

    public function check(): bool
    {
        $grownEnough = ($this->generatedBytes - $this->lastAttemptRawBytes) >= max(self::MIN_CHUNK, $this->targetSize * 0.05);
        if ($this->lastActualBytes > 0 && !$grownEnough) {
            return false;
        }
        $this->lastAttemptRawBytes = $this->generatedBytes;

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        foreach (explode("\n\n", $this->textBuffer) as $paragraph) {
            if (trim($paragraph) !== '') {
                $section->addText($paragraph);
            }
        }

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($this->outputName);
        unset($phpWord, $writer);
        gc_collect_cycles();

        $this->lastActualBytes = filesize($this->outputName);

        if ($this->lastActualBytes >= $this->targetSize) {
            $this->textBuffer = '';
            return true;
        }

        return false;
    }
}
