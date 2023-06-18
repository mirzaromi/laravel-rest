<?php

namespace App\Http\Controllers;

use App\Service\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends Controller
{
    use ApiResponse;
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $data = $this->authService->register($request);
//        return $this->successResponse(
//            Response::$statusTexts[201],
//            "Success",
//            $data,
//            ResponseAlias::HTTP_CREATED
//        );
        return response(["data" => $data], 200);
    }

    public function login(Request $request)
    {
        $data = $this->authService->login($request);
        return $this->successResponse(
            Response::$statusTexts[200],
            "Success",
            $data,
            ResponseAlias::HTTP_OK
        );
    }

    public function logout()
    {
        $this->authService->logout();
        return $this->successResponse(
            Response::$statusTexts[200],
            "Success",
            "success logout",
            ResponseAlias::HTTP_OK
        );
    }

    public function getUser()
    {
        $data = $this->authService->getUser();
        return $this->successResponse(
            Response::$statusTexts[200],
            "Success",
            $data,
            ResponseAlias::HTTP_OK
        );
    }
}
