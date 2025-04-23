<?php

namespace App\Http\Controllers;

use App\Services\LoggingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DIController extends Controller
{
    private $globalService;

    public function __construct(LoggingService $log){
        $this->globalService = $log;
    }

    public function beforedi(){
        $service = new LoggingService();
        $service->log("this is my message from before function");
        return "ok done";
    }
    public function withdi(LoggingService $service){
        $service->log("this is my message using Dependency Injection");
        return "ok";
    }

    public function di1(){
        $this->globalService->log("this is my message from function d1 using constructor injection");
    }
    public function di2(){
        $this->globalService->log("this is my message from function d1 using constructor injection");
    }


}
