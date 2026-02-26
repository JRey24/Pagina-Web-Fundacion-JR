<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);

// Now use Eloquent
use App\Models\Usuario;

$admin = Usuario::where('username', 'administrador')->first();
if ($admin) {
    echo "Found admin: id={$admin->id_usuario}, username={$admin->username}\n";
} else {
    echo "Admin user not found\n";
}

$kernel->terminate($request, $response);
