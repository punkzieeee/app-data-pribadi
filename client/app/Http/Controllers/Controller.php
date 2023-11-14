<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Response($message, $data, $code)
    {
        return response()->json([
            "message" => $message,
            "statusCode" => $code,
            "data" => $data
        ]);
    }
}
