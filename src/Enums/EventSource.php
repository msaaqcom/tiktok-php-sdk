<?php

namespace Msaaq\TikTok\Enums;

enum EventSource: string
{
    case WEB = 'web';
    case APP = 'app';
    case OFFLINE = 'offline';
}
