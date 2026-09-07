<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\Responder\Interface;

interface Responder
{
    public function respond(string $response): void;
}
