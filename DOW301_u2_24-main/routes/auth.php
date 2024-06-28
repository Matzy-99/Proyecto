<?php

use Illuminate\Support\Facades\Route;

// Rutas para usuarios no autenticados (guest)
Route::middleware('guest')->group(function () {
    Route::get('register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('register', function () {
        // Lógica de registro aquí
    });

    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('login', function () {
        // Lógica de inicio de sesión aquí
    });

    Route::get('forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('forgot-password', function () {
        // Lógica para enviar el correo de restablecimiento de contraseña aquí
    });

    Route::get('reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('reset-password', function () {
        // Lógica para guardar la nueva contraseña aquí
    });
});

// Rutas para usuarios autenticados (auth)
Route::middleware('auth')->group(function () {
    Route::get('verify-email', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', function ($id, $hash) {
        // Lógica para verificar el correo electrónico aquí
    })->middleware(['signed', 'throttle:6,1'])
      ->name('verification.verify');

    Route::post('email/verification-notification', function () {
        // Lógica para enviar la notificación de verificación de correo electrónico aquí
    })->middleware('throttle:6,1')
      ->name('verification.send');

    Route::get('confirm-password', function () {
        return view('auth.confirm-password');
    })->name('password.confirm');

    Route::post('confirm-password', function () {
        // Lógica para confirmar la contraseña aquí
    });

    Route::put('password', function () {
        // Lógica para actualizar la contraseña aquí
    })->name('password.update');

    Route::post('logout', function () {
        // Lógica para cerrar sesión aquí
    })->name('logout');
});
