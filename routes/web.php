<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/projects', function () {
        return view('projects');
    })->name('projects');

    Route::get('/projects/{id}', function () {
        return view('project');
    })->name('project');

    Route::get('/clients', function () {
        return view('clients');
    })->name('clients');

    Route::get('/types', function () {
        return view('types');
    })->name('types');

    Route::get('/texts', function () {
        return view('texts');
    })->name('texts');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
});
