<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait APIResponse
{
    public function sendSuccess($message, $content , $code=Response::HTTP_OK){
        return response()->json([
           "success"=>"true",
           "message"=>$message,
           "data"=>$content
        ], $code);
    }

    public function sendError($message, $content = [] , $code = Response::HTTP_INTERNAL_SERVER_ERROR){
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if(!empty($content)){
            $response['data'] = $content;
        }

        return response()->json($response, $code);
    }
}
