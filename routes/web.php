<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\CitaController;

Route::middleware('auth')->group(function() {
    // Rutas protegidas que requieren autenticación

    Route::get('/', function () {
        return view('index');
    })->name('index');

    // Rutas para la gestión del perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/doctores.create', [DoctorController::class, 'create'])->name('doctores.create');
    Route::post('/doctores.store', [DoctorController::class, 'store'])->name('doctores.store');
    Route::get('/doctores', [DoctorController::class, 'index'])->name('doctores.index');
    Route::delete('/doctores/{id}', [DoctorController::class, 'destroy'])->name('doctores.destroy');
    Route::get('/doctores/{id}', [DoctorController::class, 'edit'])->name('doctores.edit');
    Route::put('/doctores/{id}', [DoctorController::class, 'update'])->name('doctores.update');

    Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
    Route::get('pacientes.create', [PacienteController::class, 'create'])->name('pacientes.create');
    Route::post('/pacientes.store', [PacienteController::class, 'store'])->name('pacientes.store');
    Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
    Route::get('/pacientes/{id}', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');

    Route::get('/consultorios', [ConsultorioController::class, 'index'])->name('consultorios.index');
    Route::get('/consultorios.create', [ConsultorioController::class, 'create'])->name('consultorios.create');
    Route::post('/consultorios.store', [ConsultorioController::class, 'store'])->name('consultorios.store');
    Route::delete('/consultorios/{id}', [ConsultorioController::class, 'destroy'])->name('consultorios.destroy');
    Route::get('/consultorios/{id}', [ConsultorioController::class, 'edit'])->name('consultorios.edit');
    Route::put('/consultorios/{id}', [ConsultorioController::class, 'update'])->name('consultorios.update');

    Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
    Route::get('/citas.create', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/citas.store', [CitaController::class, 'store'])->name('citas.store');
    Route::delete('/citas/{id}', [CitaController::class, 'destroy'])->name('citas.destroy');
    Route::get('/citas/{id}', [CitaController::class, 'edit'])->name('citas.edit');
    Route::put('/citas/{id}', [CitaController::class, 'update'])->name('citas.update');
});

// Ruta de logout fuera del grupo `auth` porque no requiere autenticación
Route::post('/logout', function () {
    Auth::logout();  // Cierra la sesión del usuario
    request()->session()->invalidate();  // Invalida la sesión
    request()->session()->regenerateToken();  // Regenera el token CSRF

    // Redirige explícitamente a la ruta 'loginpage'
    return redirect()->route('loginpage'); 
})->name('logout');

// Otras rutas que no requieren autenticación

Route::get('/loginpage', function () {
    return view('loginpage');
})->name('loginpage');

Route::get('/registrar', function () {
    return view('registrar');
})->name('register');

Route::post('/registrar', [RegistrarController::class, 'store'])->name('registrar.store');
Route::post('/loginpage', [RegistrarController::class, 'check'])->name('login.check');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de autenticación generadas automáticamente
require __DIR__.'/auth.php';
