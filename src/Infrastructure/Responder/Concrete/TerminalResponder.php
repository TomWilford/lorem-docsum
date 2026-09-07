<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Infrastructure\Responder\Concrete;

use TomWilford\LoremDocsum\Infrastructure\Responder\Interface\Responder;

class TerminalResponder implements Responder
{
    public function respond(string $response): void
    {
        fwrite(STDOUT, $response . PHP_EOL);
    }
}
