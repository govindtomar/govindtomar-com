<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\WordMeaningController;
use App\Http\Controllers\Admin\ArtisanController;
use App\Http\Controllers\Admin\ContactMeController;

/***********************************************************
*				Dashboard Controller Routes
***********************************************************/
Route::get('dashboard', [DashboardController::class, 'index']);

/***********************************************************
*				Group Routes
***********************************************************/
Route::group(['prefix' => 'admin','as' => 'admin.'], function(){
	/***********************************************************
	*				Chat Controller Routes
	***********************************************************/
	Route::get('/chat', [ChatController::class, 'index']);
	Route::get('/chat/{id}', [ChatController::class, 'chat']);
	Route::post('/chat/send-message', [ChatController::class, 'sendMessage']);
	Route::post('/chat/refresh-message', [ChatController::class, 'refreshMessage']);
	Route::post('/chat/translate', [ChatController::class, 'translate']);

	/***********************************************************
	*			Word Meaning Controller Routes
	***********************************************************/
	Route::resource('word-meaning', WordMeaningController::class);
	Route::post('word-meaning/status', [WordMeaningController::class, 'status'])->name('word-meaning.status');


	/***********************************************************
	*			Contact Me Controller Routes
	***********************************************************/
	Route::resource('contact-me', ContactMeController::class);

	/***********************************************************
	*			Artisan Command Controller Routes
	***********************************************************/
	Route::get('/migrate-table', [ArtisanController::class, 'migrateTable']);
	Route::get('/migrate-table-fresh', [ArtisanController::class, 'migrateTableFresh']);

});