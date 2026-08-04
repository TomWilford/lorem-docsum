<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure;

use PhpOffice\PhpWord\IOFactory;
use TomWilford\LoremDocsum\Infrastructure\ExportTo;

class ExportToDocx implements ExportTo
{
    public function export(string $content): void
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();
        $section->addText($content);

        $writer = IOFactory::createWriter($phpWord);
        $writer->save('lorem.docx');
    }
}
