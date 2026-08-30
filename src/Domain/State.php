<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Domain;

enum State
{
    case IDLE;
    case WRITING;
    case CHECKING;
    case COMPLETE;
}
