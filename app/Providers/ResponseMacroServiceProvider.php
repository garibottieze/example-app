<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Response::macro('success', function (object $data) {
            return Response::json([
                'message' => null,
                'data' => $data,
            ]);
        });

        Response::macro('error', function (int $statusCode = 500, string $message = null) {
            if (!in_array($statusCode, [400, 401, 403, 404, 422, 500])) {
                $statusCode = 500;
            }
            return Response::json([
                'message' => $message,
                'data' => null,
            ], $statusCode);
        });
    }
}
