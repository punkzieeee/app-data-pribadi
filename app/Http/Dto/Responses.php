<?php

namespace App\Http\Dto;

class Responses
{
    public function Response($message, $data, $code)
    {
        return response()->json([
            "message" => $message,
            "statusCode" => $code,
            "data" => $data
        ]);
    }
}
