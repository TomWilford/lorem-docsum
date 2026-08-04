<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Domain;

use TomWilford\LoremDocsum\Infrastructure\ExportTo;
use TomWilford\LoremDocsum\Infrastructure\ExportToDocx;
use TomWilford\LoremDocsum\Infrastructure\ExportToTxt;

enum OutputType: string
{
    case TXT = 'txt';
    case DOCX = 'docx';

    public function exporter(): ExportTo
    {
        return match ($this) {
            self::DOCX => new ExportToDocx(),
            default => new ExportToTxt(),
        };
    }
}
