<?php

namespace App\Exceptions;


use App\Traits\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (NotFoundException $e, Request $request) {
            if ($request->is('api/*')) {
                return $this->errorResponse(
                    Response::$statusTexts[500],
                    $e->getMessage(),
                    ResponseAlias::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        });

        $this->renderable(function (\Exception $e, Request $request) {
            if ($request->is('api/*')) {
                return $this->errorResponse(
                    Response::$statusTexts[500],
                    $e->getMessage(),
                    ResponseAlias::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        });


    }

}
