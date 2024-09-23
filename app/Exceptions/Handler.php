<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthenticationException) {
            return response()->json(['status' => 'error', 'message' => 'Unauthenticated'], 401);
        }

        return parent::render($request, $exception);
    }
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register()
    {
        // $this->renderable(function (AuthorizationException $e) {
        //     return response()->json(["status" => "errors", "message" => $e->getMessage()], JsonResponse::HTTP_UNAUTHORIZED);
        // });

        // $this->renderable(function (AuthenticationException $e) {
        //     return response()->json(["status" => "errors", "message" => "Unauthenticated"], JsonResponse::HTTP_UNAUTHORIZED);
        // });

        // $this->renderable(function (Throwable $e) {
        //     return response()->json(["status" => "errors", "message" => "Unknown error"], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        // });
    }

    // public function render($request, \Throwable $e)
    // {
    //     // Handle additional custom rendering logic here if needed
    // }

    // Implement other methods of the ExceptionHandler interface


    // Example usage within the register() method

}
