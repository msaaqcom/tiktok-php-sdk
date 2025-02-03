<?php

namespace Msaaq\TikTok\Exceptions;

use Exception;

class AccessTokenIncorrectOrRevokedException extends Exception
{
    public function __construct($message = null)
    {
        parent::__construct($message ?? 'Access token is incorrect or revoked.');
    }
}
