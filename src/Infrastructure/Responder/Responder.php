<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\Responder;

interface Responder
{
    public function respond(string $response): void;
}
