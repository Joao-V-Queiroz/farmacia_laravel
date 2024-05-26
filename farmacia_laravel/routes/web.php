<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', [UserController::class , 'index'])->name('user.index');
#grupo de rotas
Route::group(['prefix' => 'admin/user'], function(){
    Route::get('/create', [UserController::class, 'create'])->name('user.create'); # Rota para criar um novo usuário
    Route::post('/add', [UserController::class, 'store'])->name('user.store'); # Rota para salvar os dados do usuário
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show'); # Rota para mostrar os dados do usuário
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit'); # Rota para editar os dados do usuário
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update'); # Rota para atualizar os dados do usuário
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy'); # Rota para deletar os dados do usuário
});
