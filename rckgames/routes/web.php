<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectGalleryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SwTypeController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\RCKInfoController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {return view('layouts.app');});
Route::post('/login',[AuthController::class, 'authenticate']);
Route::get('/dashboard',[AdminController::class, 'login']);

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::prefix('projects')->group(function () {
    Route::get('{project}/galleries/create', [ProjectGalleryController::class, 'create'])->name('galleries.create');
    Route::post('{project}/galleries', [ProjectGalleryController::class, 'store'])->name('galleries.store');
    Route::delete('/galleries/{gallery}', [ProjectGalleryController::class, 'destroy'])->name('galleries.destroy');
    //Route::delete('{project}/galleries/{gallery}', [ProjectGalleryController::class, 'destroy'])->name('galleries.destroy');
    Route::get('{project}/project_types/create', [ProjectController::class, 'createProjectType'])->name('project_types.create');
    Route::post('{project}/project_types', [ProjectController::class, 'storeProjectType'])->name('project_types.store');
    Route::delete('{project}/project_types/{projectType}', [ProjectController::class, 'destroyProjectType'])->name('project_types.destroy');
});

Route::get('/sw_types', [SwTypeController::class, 'index'])->name('sw_types.index');
Route::get('/sw_types/create', [SwTypeController::class, 'create'])->name('sw_types.create');
Route::post('/sw_types', [SwTypeController::class, 'store'])->name('sw_types.store');
Route::get('/sw_types/{sw_type}', [SwTypeController::class, 'show'])->name('sw_types.show');
Route::get('/sw_types/{sw_type}/edit', [SwTypeController::class, 'edit'])->name('sw_types.edit');
Route::put('/sw_types/{sw_type}', [SwTypeController::class, 'update'])->name('sw_types.update');
Route::delete('/sw_types/{sw_type}', [SwTypeController::class, 'destroy'])->name('sw_types.destroy');

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

Route::get('/texts', [TextController::class, 'index'])->name('texts.index');
Route::get('/texts/create', [TextController::class, 'create'])->name('texts.create');
Route::post('/texts', [TextController::class, 'store'])->name('texts.store');
Route::get('/texts/{text}', [TextController::class, 'show'])->name('texts.show');
Route::get('/texts/{text}/edit', [TextController::class, 'edit'])->name('texts.edit');
Route::put('/texts/{text}', [TextController::class, 'update'])->name('texts.update');
Route::delete('/texts/{text}', [TextController::class, 'destroy'])->name('texts.destroy');

Route::get('/rckinfo', [RCKInfoController::class, 'index'])->name('info.index');
Route::get('/rckinfo/create', [RCKInfoController::class, 'create'])->name('info.create');
Route::post('/rckinfo', [RCKInfoController::class, 'store'])->name('info.store');
Route::get('/rckinfo/{info}', [RCKInfoController::class, 'show'])->name('info.show');
Route::get('/rckinfo/{info}/edit', [RCKInfoController::class, 'edit'])->name('info.edit');
Route::put('/rckinfo/{info}', [RCKInfoController::class, 'update'])->name('info.update');
Route::delete('/rckinfo/{info}', [RCKInfoController::class, 'destroy'])->name('info.destroy');

