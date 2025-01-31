<?php

namespace App\Traits;

use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\JsonResponse;
use Exception;

trait HandleExceptions
{
    /**
     * Handle generic exceptions.
     *
     * @param Exception $exception
     * @return JsonResponse
     */
    public function handleException(Exception $exception, $status_code = 500, $message='An error occurred'): JsonResponse
    {
        return response()->json([
            'error' => $message,
            'message' => $exception->getMessage()
        ], $status_code);
    }
}