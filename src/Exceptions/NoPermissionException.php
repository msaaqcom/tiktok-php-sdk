<?php

namespace Msaaq\TikTok\Exceptions;

use Exception;

class NoPermissionException extends Exception
{
    public function __construct($message = null)
    {
        parent::__construct($message ?? 'No permission to access this resource.');
    }
}
