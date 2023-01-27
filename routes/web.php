<?php

use App\Http\Controllers\MensagemController;
use App\Http\Controllers\ListUserController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Router List User
Route::get('/listUsers', [ListUserController::class, 'index'])->name('listUsers');
Route::post('/listUsers/update', [ListUserController::class, 'update'])->name('listUsers.update');
// Route::resource('listUsers', ListUserController::class)->except(['update']);
Route::post('/listUsers/destroy', [ListUserController::class, 'destroy'])->name('listUsers.destroy');

//Router Mensseger
Route::get('/listMsg', [MensagemController::class, 'index']);

Route::get('/mensagem/create', [MensagemController::class, 'create']);

Route::get('/mensagem/response', [MensagemController::class, 'response']);


Route::post('/mensagem/search', [MensagemController::class, 'search'])->name('listMails.search');
Route::post('/mensagem/searchMsgLida', [MensagemController::class, 'searchMsgLida'])->name('listMails.searchMsgLida');
Route::post('/mensagem/searchAssunto', [MensagemController::class, 'searchAssunto'])->name('listMails.searchAssunto');



Route::get('/mensagem/{id}', [MensagemController::class, 'show']);

Route::post('/create', [MensagemController::class, 'store']);

Route::post('/listMails/update', [MensagemController::class, 'update'])->name('listMails.update');

Route::delete('/listMails/destroy', [MensagemController::class, 'destroy'])->name('listMails.delete');

// Route::resource('listUsers', ListUserController::class)->except(['update']);
//Route::post('/mensagem/destroy', [MensagemController::class, 'destroy'])->name('listUsers.destroy');