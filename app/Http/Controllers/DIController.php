<?php

namespace App\Http\Controllers;

use App\Services\LoggingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DIController extends Controller
{
    private  $myService;
    public function __construct(LoggingService $globalService){
        $this->myService = $globalService;
    }

    public function beforedi(){
        $service = new LoggingService();
        $service->log("this is my content before DI");
        return "ok done";
    }

    public function afterdi(LoggingService $service){
        $service->log("this is my content after DI");
        return "ok";
    }

    public function afterdi2(LoggingService $service){
        $service->log("this is my content after DI");
        return "ok";
    }

    public function di1(){
        $this->myService->log("this is my content in di1");
    }

    public function di2(){
        $this->myService->log("this is my content in di2");
    }

}
