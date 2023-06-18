<?php

namespace App\BaseResponse;

class BaseResponse
{
    public static function response(String $status, String $message, mixed $data): array
    {
        return [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
    }
}
