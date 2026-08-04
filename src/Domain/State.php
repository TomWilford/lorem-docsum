<?php

namespace TomWilford\LoremDocsum\Domain;

enum State
{
    case IDLE;
    case WRITING;
    case CHECKING;
    case TARGET_REACHED;
    case COMPLETE;
}
