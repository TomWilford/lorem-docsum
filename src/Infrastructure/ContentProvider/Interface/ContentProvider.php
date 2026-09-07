<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\ContentProvider\Interface;

interface ContentProvider
{
    public function getContent(int $length = 100): string;
}
