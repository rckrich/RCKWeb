<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/qa/livewire/livewire.js', $handle);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')
    ->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');

    Route::get('/projects', function () {
        return view('admin/projects');
    })->name('admin-projects');

    Route::get('/projects/{id}', function () {
        return view('admin/project');
    })->name('admin-project');

    Route::get('/clients', function () {
        return view('admin/clients');
    })->name('admin-clients');

    Route::get('/types', function () {
        return view('admin/types');
    })->name('admin-types');

    Route::get('/texts', function () {
        return view('admin/texts');
    })->name('admin-texts');

    Route::get('/contact', function () {
        return view('admin/contact');
    })->name('admin-contact');
});
