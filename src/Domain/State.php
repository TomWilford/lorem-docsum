<?php

namespace TomWilford\LoremDocsum;

enum State
{
    case IDLE;
    case WRITING;
    case CHECKING;
    case COMPLETE;
}
