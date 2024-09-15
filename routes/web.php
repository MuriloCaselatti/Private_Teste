<?php

use App\Http\Controllers\Controlador;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Página de login como a página inicial
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'), // Certifique-se de que isso está presente
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
// Rotas de autenticação
Auth::routes();

// Rota para receitas, protegida por autenticação
// Rota para receitas, protegida por autenticação
Route::resource('recipes', Controlador::class)->middleware('auth');

// Rota específica para o index das receitas
Route::get('/recipes', [Controlador::class, 'index'])->name('recipes.index');

// Redireciona para a página de receitas após o login
Route::get('/home', function () {
    return redirect()->route('recipes.index');
})->name('home');

// Dashboard protegido por autenticação e verificação
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
// Adiciona a rota para armazenar avaliações
// Adiciona a rota para armazenar avaliações
// Route::post('/recipes/{id}/reviews', [Controlador::class, 'storeReview'])->name('recipes.storeReview');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redireciona para a página inicial após o logout
})->name('logout');

// routes/web.php

Route::get('/recipes', [Controlador::class, 'index'])->name('recipes.index');


require __DIR__.'/auth.php';
