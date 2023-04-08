<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes BackEnd
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware( array( 'auth:sanctum', 'verified' ) )->get(
	'/dashboard',
	function () {
		return view( 'dashboard' );
	}
)->name( 'dashboard' );


Route::group(
	array( 'middleware' => 'auth' ),
	function () {

		Route::resource( 'users', UsersController::class );
		Route::resource( 'roles', RolesController::class );

		Route::resource( 'permission', PermissionController::class );

		Route::resource( 'posts', PostsController::class );

		Route::controller( ProfileController::class )->group(
			function () {
				Route::get( '/profile', 'index' )->name( 'prof' );
				Route::post( '/profile/update_user/{id}', 'update_user' )->name( 'prof.update_user' );
				Route::post( '/profile/update_pwd/{id}', 'update_pwd' )->name( 'prof.update_pwd' );
			}
		);

	}
);


