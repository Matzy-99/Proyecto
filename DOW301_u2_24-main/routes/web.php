<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PartidosController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\EstadiosController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Rutas de autenticación para invitados
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('usuarios.login.submit');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Ruta para cerrar sesión
Route::get('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('usuarios.logout');


// Ruta principal
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Página de inicio del usuario autenticado
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    // Rutas de perfil de usuario
    Route::get('/perfil/editar', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/perfil/{user}', [ProfileController::class, 'show'])->name('profile.show');

    // Rutas de equipos
    Route::resource('equipos', EquiposController::class)->except(['show']);

    // Rutas de jugadores
    Route::resource('jugadores', JugadoresController::class)->only(['index', 'store']);

     // Rutas de partidos
     Route::get('/partidos', [PartidosController::class, 'index'])->name('partidos.index'); // Listado de partidos
     Route::get('/partidos/create', [PartidosController::class, 'create'])->name('partidos.create'); // Mostrar formulario de crear partido
     Route::post('/partidos', [PartidosController::class, 'store'])->name('partidos.store'); // Almacenar nuevo partido
     Route::get('/partidos/{partido}', [PartidosController::class, 'show'])->name('partidos.show'); // Mostrar detalles del partido
     Route::get('/partidos/{partido}/edit', [PartidosController::class, 'edit'])->name('partidos.edit'); // Mostrar formulario de edición del partido
     Route::put('/partidos/{partido}', [PartidosController::class, 'update'])->name('partidos.update'); // Actualizar partido
     Route::delete('/partidos/{partido}', [PartidosController::class, 'destroy'])->name('partidos.destroy'); // Eliminar partido

    // Rutas de estadísticas
    Route::resource('estadisticas', EstadisticasController::class);
    Route::get('/estadisticas/create/{partido_id}', [EstadisticasController::class, 'create'])->name('estadisticas.create');
});

// Rutas protegidas por autenticación y autorización de administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdministracionController::class, 'index'])->name('admin.index');

    // Ruta para mostrar el formulario de crear usuario administrador
    Route::get('/usuarios/crear-admin', [UsuariosController::class, 'showCrearAdminForm'])->name('usuarios.showCrearAdminForm');
    Route::post('/usuarios/crear-admin', [UsuariosController::class, 'storeAdmin'])->name('usuarios.storeAdmin');

    // Rutas de estadios
    Route::resource('estadios', EstadiosController::class)->except(['show']);

    // Rutas de usuarios solo para administradores
    Route::resource('usuarios', UsuariosController::class);
});

// Ruta para generar una contraseña hash
Route::get('/generate', function () {
    return Hash::make('password123');
});
