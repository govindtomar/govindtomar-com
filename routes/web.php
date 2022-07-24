<?php

require __DIR__.'/web/auth.php';

require __DIR__.'/web/front.php';

require __DIR__.'/web/admin.php';



 // Package Controller Routes 
use App\Http\Controllers\Admin\PackageController;
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
	Route::resource('package', PackageController::class);
	Route::post('package/publish', [PackageController::class, 'publish'])->name('package.publish');
});

 // Blog Controller Routes 
use App\Http\Controllers\Admin\BlogController;
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
	Route::resource('blog', BlogController::class);
	Route::post('blog/publish', [BlogController::class, 'publish'])->name('blog.publish');
});