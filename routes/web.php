<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('home');
})->name('home');

Route::get('/login', fn () => redirect()->route('home'))->name('login');

Route::view('/admin', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');

Route::view('/cardapios', 'cardapios', ['items' => config('cardapio.items')])
    ->middleware('auth')
    ->name('cardapios');

Route::view('/equipe', 'equipe')
    ->middleware('auth')
    ->name('equipe');

Route::view('/pedidos', 'pedidos')
    ->middleware('auth')
    ->name('pedidos');

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');
})->middleware('auth')->name('logout');

Route::get('/clientes', function () {
    return view('clientes');
});