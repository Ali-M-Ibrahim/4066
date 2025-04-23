<?php

namespace App\Services;

class LoggingService
{
    public function log($content)
    {
        logger($content);
    }

}
