<?php

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Route;

Route::post('/generate-jwt', function (Request $request) {
    $payload = [
        'iss' => url('/'),          // Issuer
        'iat' => time(),            // Issued at
        'exp' => time() + 3600,     // Expiration (1 hour)
        'sub' => 'user123',         // Subject - change as needed
        // add any other claims here
    ];

    $secretKey = env('JWT_SECRET', 'your-secret-key'); // Set in .env

    $jwt = JWT::encode($payload, $secretKey, 'HS256');

    return response()->json(['token' => $jwt]);
})->name('api.generate-jwt');
