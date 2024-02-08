<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\TagController;

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

// restituzione dati in forma di json
Route::get('/json', function () {
    return response()->json([
        'message' => 'Hello, world!',
        'data' => [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'age' => 30,
        ]
    ]);
});




Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource("events", EventsController::class);
        Route::resource("posts", PostController::class);
        Route::get('/tags', [TagController::class, 'metodoIndex']);
        Route::get('/tags/{id}', [TagController::class, 'metodoShow']);
    });

require __DIR__ . '/auth.php';
