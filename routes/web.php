<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\Admin\PartnerController;
use Illuminate\Support\Facades\Route;
use Firebase\JWT\JWT;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('partners', PartnerController::class);
});
Route::get('/posts', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts.index');
Route::get('/stat', [StatController::class, 'index'])->middleware(['auth', 'verified'])->name('stat.index');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
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

require __DIR__.'/auth.php';
