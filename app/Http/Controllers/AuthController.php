<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\usuario_rol;
use App\Models\rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:usuario,username',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'username.required' => 'El nombre de usuario es obligatorio.',
            'username.unique' => 'Este nombre de usuario ya está registrado.',
            'username.max' => 'El nombre de usuario no puede tener más de :max caracteres.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        try {
            // Determine id_usuario since the DB primary key is not auto-incrementing
            $maxId = Usuario::max('id_usuario');
            $nextId = $maxId ? ($maxId + 1) : 1;

            $usuario = Usuario::create([
                'id_usuario' => $nextId,
                'username' => $data['username'],
                'password_hash' => Hash::make($data['password']),
                'fecha_creacion' => now(),
            ]);

            // Auto-login
            $request->session()->put('usuario_id', $usuario->id_usuario);
            $request->session()->put('usuario_username', $usuario->username);

            // Flash flag so the modal opens one time after registration
            return redirect()->back()->with([
                'success' => 'Cuenta creada y sesión iniciada correctamente',
                'open_user_modal' => 'register'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear la cuenta: ' . $e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'El nombre de usuario es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        $usuario = Usuario::where('username', $data['username'])->first();
        
        if ($usuario && Hash::check($data['password'], $usuario->password_hash)) {
            $request->session()->put('usuario_id', $usuario->id_usuario);
            $request->session()->put('usuario_username', $usuario->username);
            // Flash flag so the modal opens one time after login
            return redirect()->back()->with([
                'success' => 'Sesión iniciada correctamente',
                'open_user_modal' => 'login'
            ]);
        }

        return redirect()->back()->withErrors(['login' => 'Usuario o contraseña inválidos']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['usuario_id', 'usuario_username']);
        return redirect()->back()->with('success', 'Sesión cerrada correctamente');
    }

    public function setupAdmin()
    {
        try {
            $admin = Usuario::where('username', 'administrador')->first();
            if (!$admin) {
                return 'Usuario administrador no encontrado en la base de datos';
            }
            // Asegurar que exista el registro en la tabla `rol`
            $adminRol = rol::firstOrCreate([
                'nombre_rol' => 'administrador'
            ], [
                'descripcion' => 'Administrador del sistema'
            ]);

            // Verificar si ya existe la relación usuario_rol
            $rel = usuario_rol::where('id_usuario', $admin->id_usuario)
                ->where('id_rol', $adminRol->id_rol)
                ->first();

            if ($rel) {
                return 'El usuario "' . $admin->username . '" ya tiene el rol administrador';
            }

            // Crear la relación en usuario_rol (id_usuario_rol es varchar(15) en la BD)
            usuario_rol::create([
                'id_usuario_rol' => uniqid(),
                'id_usuario' => $admin->id_usuario,
                'id_rol' => $adminRol->id_rol,
            ]);

            return 'Rol administrador asignado correctamente a ' . $admin->username;
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function miCuenta(Request $request)
    {
        $usuarioId = $request->session()->get('usuario_id');
        
        if (!$usuarioId) {
            return redirect('/')->with('error', 'Debes iniciar sesión para acceder');
        }

        $usuario = Usuario::find($usuarioId);
        
        if (!$usuario) {
            return redirect('/')->with('error', 'Usuario no encontrado');
        }

        // Verificar si es administrador
        $adminRol = rol::where('nombre_rol', 'administrador')->first();
        $esAdmin = false;
        if ($adminRol) {
            $esAdmin = usuario_rol::where('id_usuario', $usuario->id_usuario)
                ->where('id_rol', $adminRol->id_rol)
                ->exists();
        }

        if (!$esAdmin) {
            return redirect('/')->with('error', 'No tienes permisos para acceder a esta página');
        }

        // Obtener todos los usuarios con sus roles
        $usuarios = Usuario::all();
        
        return view('mi-cuenta', [
            'usuarios' => $usuarios,
            'usuarioActual' => $usuario
        ]);
    }
}
