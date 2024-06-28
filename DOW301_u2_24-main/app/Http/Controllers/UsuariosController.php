<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    // Mostrar formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirigir al usuario a la página deseada
            return redirect()->intended(route('home.index'));
        }

        // Autenticación fallida, redirigir de vuelta con errores
        return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    // Cerrar sesión del usuario
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    // Mostrar lista de usuarios
    public function index()
    {
        $usuarios = Usuario::with('rol')->get(); // Obtener usuarios con relación al rol
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.crear');
    }

    // Almacenar un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
            'rol_id' => 'required|in:1,2', // Validación del rol_id
        ]);

        // Crear el usuario en la base de datos
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id, // Asignar rol_id según el formulario
        ]);

        // Redirigir de vuelta a la lista de usuarios con un mensaje de éxito
        $rol = $request->rol_id == 1 ? 'administrador' : 'usuario';
        return redirect()->route('usuarios.index')->with('success', "Usuario $rol creado exitosamente.");
    }

    // Eliminar un usuario específico
    public function destroy(Usuario $usuario)
    {
        if ($usuario->id === auth()->id()) {
            return redirect()->back()->withErrors('No puedes eliminarte a ti mismo.');
        }

        // Eliminar el usuario y redirigir de vuelta a la lista de usuarios con un mensaje de éxito
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }

    // Mostrar formulario para crear un nuevo usuario administrador
    public function showCrearAdminForm()
    {
        return view('usuarios.crear-admin');
    }

    // Almacenar un nuevo usuario administrador en la base de datos
    public function storeAdmin(Request $request)
    {
        return $this->store($request->merge(['rol_id' => 1])); // Llamar al método store() con rol_id = 1 (administrador)
    }
}
