<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\ContentProvider;

interface ContentProvider
{
    public function getContent(): string;
}
