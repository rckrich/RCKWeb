<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectGalleryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SwTypeController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\RCKInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::prefix('/')->group(function () {
    Route::get('/', [LandingController::class, 'index'])->name('home');
    Route::get('/#index', [LandingController::class, 'index'])->name('home.index');
    Route::get('/#services', [LandingController::class, 'index'])->name('home.services');
    Route::get('/#projects', [LandingController::class, 'index'])->name('home.projects');
    Route::get('/#clients', [LandingController::class, 'index'])->name('home.clients');
    Route::get('/#us', [LandingController::class, 'index'])->name('home.us');
    Route::get('/#contact', [LandingController::class, 'index'])->name('home.contact');
    Route::get('/projects/{project}', [LandingController::class, 'show_project'])->name('projects.showp');

    Route::get('/login',[AuthController::class, 'login'])->name('auth.index');
    Route::post('/login',[AuthController::class, 'authenticate'])->name('auth.login');
    Route::get('/register',[AuthController::class, 'new_user'])->name('auth.new_user');
    Route::post('/register',[AuthController::class, 'register'])->name('auth.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
//});


/* ADMIN PANEL */
Route::prefix('/dashboard')->group(function () {
    Route::get('/', function () {return view('layouts.dashboard');})->middleware('auth');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index')->middleware('auth');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create')->middleware('auth');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store')->middleware('auth');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show')->middleware('auth');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit')->middleware('auth');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update')->middleware('auth');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy')->middleware('auth');

    Route::prefix('projects')->group(function () {
        Route::get('{project}/galleries/create', [ProjectGalleryController::class, 'create'])->name('galleries.create')->middleware('auth');
        Route::post('{project}/galleries', [ProjectGalleryController::class, 'store'])->name('galleries.store')->middleware('auth');
        Route::delete('/galleries/{gallery}', [ProjectGalleryController::class, 'destroy'])->name('galleries.destroy')->middleware('auth');
        //Route::delete('{project}/galleries/{gallery}', [ProjectGalleryController::class, 'destroy'])->name('galleries.destroy');
        Route::get('{project}/project_types/create', [ProjectController::class, 'createProjectType'])->name('project_types.create')->middleware('auth');
        Route::post('{project}/project_types', [ProjectController::class, 'storeProjectType'])->name('project_types.store')->middleware('auth');
        Route::delete('{project}/project_types/{projectType}', [ProjectController::class, 'destroyProjectType'])->name('project_types.destroy')->middleware('auth');
    });

    Route::get('/sw_types', [SwTypeController::class, 'index'])->name('sw_types.index')->middleware('auth');
    Route::get('/sw_types/create', [SwTypeController::class, 'create'])->name('sw_types.create')->middleware('auth');
    Route::post('/sw_types', [SwTypeController::class, 'store'])->name('sw_types.store')->middleware('auth');
    Route::get('/sw_types/{sw_type}', [SwTypeController::class, 'show'])->name('sw_types.show')->middleware('auth');
    Route::get('/sw_types/{sw_type}/edit', [SwTypeController::class, 'edit'])->name('sw_types.edit')->middleware('auth');
    Route::put('/sw_types/{sw_type}', [SwTypeController::class, 'update'])->name('sw_types.update')->middleware('auth');
    Route::delete('/sw_types/{sw_type}', [SwTypeController::class, 'destroy'])->name('sw_types.destroy')->middleware('auth');

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index')->middleware('auth');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware('auth');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store')->middleware('auth');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit')->middleware('auth');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update')->middleware('auth');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy')->middleware('auth');

    Route::get('/texts', [TextController::class, 'index'])->name('texts.index')->middleware('auth');
    Route::get('/texts/create', [TextController::class, 'create'])->name('texts.create')->middleware('auth');
    Route::post('/texts', [TextController::class, 'store'])->name('texts.store')->middleware('auth');
    Route::get('/texts/{text}', [TextController::class, 'show'])->name('texts.show')->middleware('auth');
    Route::get('/texts/{text}/edit', [TextController::class, 'edit'])->name('texts.edit')->middleware('auth');
    Route::put('/texts/{text}', [TextController::class, 'update'])->name('texts.update')->middleware('auth');
    Route::delete('/texts/{text}', [TextController::class, 'destroy'])->name('texts.destroy')->middleware('auth');

    Route::get('/rckinfo', [RCKInfoController::class, 'index'])->name('info.index')->middleware('auth');
    Route::get('/rckinfo/create', [RCKInfoController::class, 'create'])->name('info.create')->middleware('auth');
    Route::post('/rckinfo', [RCKInfoController::class, 'store'])->name('info.store')->middleware('auth');
    Route::get('/rckinfo/{info}', [RCKInfoController::class, 'show'])->name('info.show')->middleware('auth');
    Route::get('/rckinfo/{info}/edit', [RCKInfoController::class, 'edit'])->name('info.edit')->middleware('auth');
    Route::put('/rckinfo/{info}', [RCKInfoController::class, 'update'])->name('info.update')->middleware('auth');
    Route::delete('/rckinfo/{info}', [RCKInfoController::class, 'destroy'])->name('info.destroy')->middleware('auth');
});
