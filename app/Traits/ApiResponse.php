<?php

namespace App\Traits;

trait ApiResponse
{
    protected function successResponse(String $status, String $message, mixed $data, int $httpResponse)
    {
        return response([
            "status" => $status,
            "message" => $message,
            "data" => $data
        ], $httpResponse);
    }

    protected function errorResponse(String $status, String $message, int $httpResponse)
    {
        return response([
            "status" => $status,
            "message" => $message
        ], $httpResponse);
    }
}
