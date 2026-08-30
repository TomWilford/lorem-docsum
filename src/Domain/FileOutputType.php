<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Domain;

use TomWilford\LoremDocsum\Infrastructure\ContentProvider\ContentProvider;
use TomWilford\LoremDocsum\Infrastructure\FileOutput\DocxFileOutputStrategy;
use TomWilford\LoremDocsum\Infrastructure\FileOutput\FileOutputStrategy;
use TomWilford\LoremDocsum\Infrastructure\FileOutput\TxtFileOutputStrategy;

enum FileOutputType: string
{
    case TXT = 'txt';
    case DOCX = 'docx';

    public function getOutputStrategy(ContentProvider $contentProvider): FileOutputStrategy
    {
        return match ($this) {
            self::DOCX => new DocxFileOutputStrategy($contentProvider),
            default => new TxtFileOutputStrategy($contentProvider),
        };
    }

    public function extension(): string
    {
        return match ($this) {
            self::DOCX => '.docx',
            self::TXT => '.txt',
        };
    }
}
