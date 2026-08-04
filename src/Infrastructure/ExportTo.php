<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure;

interface ExportTo
{
    public function export(string $content): void;
}
