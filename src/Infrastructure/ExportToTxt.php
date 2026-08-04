<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure;

use SplFileObject;

class ExportToTxt implements ExportTo
{
    public function export(string $content): void
    {
        $file = new SplFileObject('lorem.txt', 'w');
        $file->fwrite($content);
    }
}
