<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', function () {
    return view('inicio');
});

Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});

Route::get('/proyectos', function () {
    return view('proyectos');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/quiero-donar', function () {
    return view('quiero-donar');
});

Route::get('/usuarios', [AuthController::class, 'miCuenta']);

// Rutas de autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Rutas admin
Route::get('/setup-admin', [AuthController::class, 'setupAdmin']);
Route::get('/mi-cuenta', [AuthController::class, 'miCuenta']);

// Alias: keep /mi-cuenta and /usuarios both available (both handled by miCuenta)
