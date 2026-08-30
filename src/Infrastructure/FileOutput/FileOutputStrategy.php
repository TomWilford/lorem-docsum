<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\FileOutput;

interface FileOutputStrategy
{
    public function init(string $outputName, int $targetBytes): void;

    public function write(): void;

    public function check(): bool;
}
