<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Domain;


enum FileOutputType: string
{
    case TXT = 'txt';
    case DOCX = 'docx';

    public function extension(): string
    {
        return match ($this) {
            self::DOCX => '.docx',
            self::TXT => '.txt',
        };
    }

    public function getCompressionRatio(): int|float
    {
        return match ($this) {
            self::DOCX => 0.4,
            self::TXT => 1,
        };
    }
}
