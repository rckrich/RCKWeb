<?php

use App\Http\Controllers\LandingController;
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

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/#index', [LandingController::class, 'index'])->name('home.index');
Route::get('/#services', [LandingController::class, 'index'])->name('home.services');
Route::get('/#projects', [LandingController::class, 'index'])->name('home.projects');
Route::get('/#clients', [LandingController::class, 'index'])->name('home.clients');
Route::get('/#us', [LandingController::class, 'index'])->name('home.us');
Route::get('/#contact', [LandingController::class, 'index'])->name('home.contact');
Route::get('/projects/{project}', [LandingController::class, 'show_project'])->name('projects.show');

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/qa/livewire/livewire.js', $handle);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')
    ->group(function () {
    Route::get('/', function () {
        return view('admin/projects');
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
