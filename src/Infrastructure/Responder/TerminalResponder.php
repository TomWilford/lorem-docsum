<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\Responder;

use TomWilford\LoremDocsum\Infrastructure\Responder\Responder;

class TerminalResponder implements Responder
{
    public function respond(string $response): void
    {
        fwrite(STDOUT, $response . PHP_EOL);
    }
}
