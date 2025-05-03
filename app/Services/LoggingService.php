<?php

namespace App\Services;

class LoggingService{

    public function log($content){
        error_log($content);
        logger($content);
    }

}
