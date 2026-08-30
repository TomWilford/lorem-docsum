<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\Responder;

class NullOutputResponder implements Responder
{
    public function respond(string $response): void
    {
        // does nothing
    }
}
