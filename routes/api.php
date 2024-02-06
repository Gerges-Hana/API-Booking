<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'api'], function($router) {
    Route::get('/', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    })->name('api.hello');
});






Route::group(['middleware' =>  ['jwt.auth'],'prefix' => 'auth'], function ($router) {
Route::post('/upload/file','App\Http\Controllers\Api\Auth\FileUploadController@upload')->name('api.auth.upload.file');
Route::post('/upload/image','App\Http\Controllers\Api\Auth\FileUploadController@uploadimage')->name('api.auth.upload.image');

Route::get('/users', 'App\Http\Controllers\Api\Auth\UsersController@index')->name('api.auth.index.users');
Route::get('/users/{id}', 'App\Http\Controllers\Api\Auth\UsersController@show')->name('api.auth.show.users');
Route::post('/users', 'App\Http\Controllers\Api\Auth\UsersController@store')->name('api.auth.store.users');
Route::put('/users/{id}', 'App\Http\Controllers\Api\Auth\UsersController@update')->name('api.auth.update.users');
Route::delete('/users/{id}', 'App\Http\Controllers\Api\Auth\UsersController@destroy')->name('api.auth.delete.users');
Route::get('/users/search/{search}', 'App\Http\Controllers\Api\Auth\UsersController@search')->name('api.auth.search.users');
Route::get('/role_user', 'App\Http\Controllers\Api\Auth\RoleUserController@index')->name('api.auth.index.role_user');
Route::get('/role_user/{id}', 'App\Http\Controllers\Api\Auth\RoleUserController@show')->name('api.auth.show.role_user');
Route::post('/role_user', 'App\Http\Controllers\Api\Auth\RoleUserController@store')->name('api.auth.store.role_user');
Route::put('/role_user/{id}', 'App\Http\Controllers\Api\Auth\RoleUserController@update')->name('api.auth.update.role_user');
Route::delete('/role_user/{id}', 'App\Http\Controllers\Api\Auth\RoleUserController@destroy')->name('api.auth.delete.role_user');
Route::get('/role_user/search/{search}', 'App\Http\Controllers\Api\Auth\RoleUserController@search')->name('api.auth.search.role_user');
Route::get('/roles', 'App\Http\Controllers\Api\Auth\RolesController@index')->name('api.auth.index.roles');
Route::get('/roles/{id}', 'App\Http\Controllers\Api\Auth\RolesController@show')->name('api.auth.show.roles');
Route::post('/roles', 'App\Http\Controllers\Api\Auth\RolesController@store')->name('api.auth.store.roles');
Route::put('/roles/{id}', 'App\Http\Controllers\Api\Auth\RolesController@update')->name('api.auth.update.roles');
Route::delete('/roles/{id}', 'App\Http\Controllers\Api\Auth\RolesController@destroy')->name('api.auth.delete.roles');
Route::get('/roles/search/{search}', 'App\Http\Controllers\Api\Auth\RolesController@search')->name('api.auth.search.roles');
Route::get('/password_resets', 'App\Http\Controllers\Api\Auth\PasswordResetsController@index')->name('api.auth.index.password_resets');
Route::get('/password_resets/{id}', 'App\Http\Controllers\Api\Auth\PasswordResetsController@show')->name('api.auth.show.password_resets');
Route::post('/password_resets', 'App\Http\Controllers\Api\Auth\PasswordResetsController@store')->name('api.auth.store.password_resets');
Route::put('/password_resets/{id}', 'App\Http\Controllers\Api\Auth\PasswordResetsController@update')->name('api.auth.update.password_resets');
Route::delete('/password_resets/{id}', 'App\Http\Controllers\Api\Auth\PasswordResetsController@destroy')->name('api.auth.delete.password_resets');
Route::get('/password_resets/search/{search}', 'App\Http\Controllers\Api\Auth\PasswordResetsController@search')->name('api.auth.search.password_resets');
Route::get('/migrations', 'App\Http\Controllers\Api\Auth\MigrationsController@index')->name('api.auth.index.migrations');
Route::get('/migrations/{id}', 'App\Http\Controllers\Api\Auth\MigrationsController@show')->name('api.auth.show.migrations');
Route::post('/migrations', 'App\Http\Controllers\Api\Auth\MigrationsController@store')->name('api.auth.store.migrations');
Route::put('/migrations/{id}', 'App\Http\Controllers\Api\Auth\MigrationsController@update')->name('api.auth.update.migrations');
Route::delete('/migrations/{id}', 'App\Http\Controllers\Api\Auth\MigrationsController@destroy')->name('api.auth.delete.migrations');
Route::get('/migrations/search/{search}', 'App\Http\Controllers\Api\Auth\MigrationsController@search')->name('api.auth.search.migrations');
Route::get('/jobs', 'App\Http\Controllers\Api\Auth\JobsController@index')->name('api.auth.index.jobs');
Route::get('/jobs/{id}', 'App\Http\Controllers\Api\Auth\JobsController@show')->name('api.auth.show.jobs');
Route::post('/jobs', 'App\Http\Controllers\Api\Auth\JobsController@store')->name('api.auth.store.jobs');
Route::put('/jobs/{id}', 'App\Http\Controllers\Api\Auth\JobsController@update')->name('api.auth.update.jobs');
Route::delete('/jobs/{id}', 'App\Http\Controllers\Api\Auth\JobsController@destroy')->name('api.auth.delete.jobs');
Route::get('/jobs/search/{search}', 'App\Http\Controllers\Api\Auth\JobsController@search')->name('api.auth.search.jobs');
Route::get('/gmz_withdrawal', 'App\Http\Controllers\Api\Auth\GmzWithdrawalController@index')->name('api.auth.index.gmz_withdrawal');
Route::get('/gmz_withdrawal/{id}', 'App\Http\Controllers\Api\Auth\GmzWithdrawalController@show')->name('api.auth.show.gmz_withdrawal');
Route::post('/gmz_withdrawal', 'App\Http\Controllers\Api\Auth\GmzWithdrawalController@store')->name('api.auth.store.gmz_withdrawal');
Route::put('/gmz_withdrawal/{id}', 'App\Http\Controllers\Api\Auth\GmzWithdrawalController@update')->name('api.auth.update.gmz_withdrawal');
Route::delete('/gmz_withdrawal/{id}', 'App\Http\Controllers\Api\Auth\GmzWithdrawalController@destroy')->name('api.auth.delete.gmz_withdrawal');
Route::get('/gmz_withdrawal/search/{search}', 'App\Http\Controllers\Api\Auth\GmzWithdrawalController@search')->name('api.auth.search.gmz_withdrawal');
Route::get('/gmz_wishlist', 'App\Http\Controllers\Api\Auth\GmzWishlistController@index')->name('api.auth.index.gmz_wishlist');
Route::get('/gmz_wishlist/{id}', 'App\Http\Controllers\Api\Auth\GmzWishlistController@show')->name('api.auth.show.gmz_wishlist');
Route::post('/gmz_wishlist', 'App\Http\Controllers\Api\Auth\GmzWishlistController@store')->name('api.auth.store.gmz_wishlist');
Route::put('/gmz_wishlist/{id}', 'App\Http\Controllers\Api\Auth\GmzWishlistController@update')->name('api.auth.update.gmz_wishlist');
Route::delete('/gmz_wishlist/{id}', 'App\Http\Controllers\Api\Auth\GmzWishlistController@destroy')->name('api.auth.delete.gmz_wishlist');
Route::get('/gmz_wishlist/search/{search}', 'App\Http\Controllers\Api\Auth\GmzWishlistController@search')->name('api.auth.search.gmz_wishlist');
Route::get('/gmz_tour_availability', 'App\Http\Controllers\Api\Auth\GmzTourAvailabilityController@index')->name('api.auth.index.gmz_tour_availability');
Route::get('/gmz_tour_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzTourAvailabilityController@show')->name('api.auth.show.gmz_tour_availability');
Route::post('/gmz_tour_availability', 'App\Http\Controllers\Api\Auth\GmzTourAvailabilityController@store')->name('api.auth.store.gmz_tour_availability');
Route::put('/gmz_tour_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzTourAvailabilityController@update')->name('api.auth.update.gmz_tour_availability');
Route::delete('/gmz_tour_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzTourAvailabilityController@destroy')->name('api.auth.delete.gmz_tour_availability');
Route::get('/gmz_tour_availability/search/{search}', 'App\Http\Controllers\Api\Auth\GmzTourAvailabilityController@search')->name('api.auth.search.gmz_tour_availability');
Route::get('/gmz_tour', 'App\Http\Controllers\Api\Auth\GmzTourController@index')->name('api.auth.index.gmz_tour');
Route::get('/gmz_tour/{id}', 'App\Http\Controllers\Api\Auth\GmzTourController@show')->name('api.auth.show.gmz_tour');
Route::post('/gmz_tour', 'App\Http\Controllers\Api\Auth\GmzTourController@store')->name('api.auth.store.gmz_tour');
Route::put('/gmz_tour/{id}', 'App\Http\Controllers\Api\Auth\GmzTourController@update')->name('api.auth.update.gmz_tour');
Route::delete('/gmz_tour/{id}', 'App\Http\Controllers\Api\Auth\GmzTourController@destroy')->name('api.auth.delete.gmz_tour');
Route::get('/gmz_tour/search/{search}', 'App\Http\Controllers\Api\Auth\GmzTourController@search')->name('api.auth.search.gmz_tour');
Route::get('/gmz_term_relation', 'App\Http\Controllers\Api\Auth\GmzTermRelationController@index')->name('api.auth.index.gmz_term_relation');
Route::get('/gmz_term_relation/{id}', 'App\Http\Controllers\Api\Auth\GmzTermRelationController@show')->name('api.auth.show.gmz_term_relation');
Route::post('/gmz_term_relation', 'App\Http\Controllers\Api\Auth\GmzTermRelationController@store')->name('api.auth.store.gmz_term_relation');
Route::put('/gmz_term_relation/{id}', 'App\Http\Controllers\Api\Auth\GmzTermRelationController@update')->name('api.auth.update.gmz_term_relation');
Route::delete('/gmz_term_relation/{id}', 'App\Http\Controllers\Api\Auth\GmzTermRelationController@destroy')->name('api.auth.delete.gmz_term_relation');
Route::get('/gmz_term_relation/search/{search}', 'App\Http\Controllers\Api\Auth\GmzTermRelationController@search')->name('api.auth.search.gmz_term_relation');
Route::get('/gmz_term', 'App\Http\Controllers\Api\Auth\GmzTermController@index')->name('api.auth.index.gmz_term');
Route::get('/gmz_term/{id}', 'App\Http\Controllers\Api\Auth\GmzTermController@show')->name('api.auth.show.gmz_term');
Route::post('/gmz_term', 'App\Http\Controllers\Api\Auth\GmzTermController@store')->name('api.auth.store.gmz_term');
Route::put('/gmz_term/{id}', 'App\Http\Controllers\Api\Auth\GmzTermController@update')->name('api.auth.update.gmz_term');
Route::delete('/gmz_term/{id}', 'App\Http\Controllers\Api\Auth\GmzTermController@destroy')->name('api.auth.delete.gmz_term');
Route::get('/gmz_term/search/{search}', 'App\Http\Controllers\Api\Auth\GmzTermController@search')->name('api.auth.search.gmz_term');
Route::get('/gmz_taxonomy', 'App\Http\Controllers\Api\Auth\GmzTaxonomyController@index')->name('api.auth.index.gmz_taxonomy');
Route::get('/gmz_taxonomy/{id}', 'App\Http\Controllers\Api\Auth\GmzTaxonomyController@show')->name('api.auth.show.gmz_taxonomy');
Route::post('/gmz_taxonomy', 'App\Http\Controllers\Api\Auth\GmzTaxonomyController@store')->name('api.auth.store.gmz_taxonomy');
Route::put('/gmz_taxonomy/{id}', 'App\Http\Controllers\Api\Auth\GmzTaxonomyController@update')->name('api.auth.update.gmz_taxonomy');
Route::delete('/gmz_taxonomy/{id}', 'App\Http\Controllers\Api\Auth\GmzTaxonomyController@destroy')->name('api.auth.delete.gmz_taxonomy');
Route::get('/gmz_taxonomy/search/{search}', 'App\Http\Controllers\Api\Auth\GmzTaxonomyController@search')->name('api.auth.search.gmz_taxonomy');
Route::get('/gmz_space_availability', 'App\Http\Controllers\Api\Auth\GmzSpaceAvailabilityController@index')->name('api.auth.index.gmz_space_availability');
Route::get('/gmz_space_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzSpaceAvailabilityController@show')->name('api.auth.show.gmz_space_availability');
Route::post('/gmz_space_availability', 'App\Http\Controllers\Api\Auth\GmzSpaceAvailabilityController@store')->name('api.auth.store.gmz_space_availability');
Route::put('/gmz_space_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzSpaceAvailabilityController@update')->name('api.auth.update.gmz_space_availability');
Route::delete('/gmz_space_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzSpaceAvailabilityController@destroy')->name('api.auth.delete.gmz_space_availability');
Route::get('/gmz_space_availability/search/{search}', 'App\Http\Controllers\Api\Auth\GmzSpaceAvailabilityController@search')->name('api.auth.search.gmz_space_availability');
Route::get('/gmz_space', 'App\Http\Controllers\Api\Auth\GmzSpaceController@index')->name('api.auth.index.gmz_space');
Route::get('/gmz_space/{id}', 'App\Http\Controllers\Api\Auth\GmzSpaceController@show')->name('api.auth.show.gmz_space');
Route::post('/gmz_space', 'App\Http\Controllers\Api\Auth\GmzSpaceController@store')->name('api.auth.store.gmz_space');
Route::put('/gmz_space/{id}', 'App\Http\Controllers\Api\Auth\GmzSpaceController@update')->name('api.auth.update.gmz_space');
Route::delete('/gmz_space/{id}', 'App\Http\Controllers\Api\Auth\GmzSpaceController@destroy')->name('api.auth.delete.gmz_space');
Route::get('/gmz_space/search/{search}', 'App\Http\Controllers\Api\Auth\GmzSpaceController@search')->name('api.auth.search.gmz_space');
Route::get('/gmz_seo', 'App\Http\Controllers\Api\Auth\GmzSeoController@index')->name('api.auth.index.gmz_seo');
Route::get('/gmz_seo/{id}', 'App\Http\Controllers\Api\Auth\GmzSeoController@show')->name('api.auth.show.gmz_seo');
Route::post('/gmz_seo', 'App\Http\Controllers\Api\Auth\GmzSeoController@store')->name('api.auth.store.gmz_seo');
Route::put('/gmz_seo/{id}', 'App\Http\Controllers\Api\Auth\GmzSeoController@update')->name('api.auth.update.gmz_seo');
Route::delete('/gmz_seo/{id}', 'App\Http\Controllers\Api\Auth\GmzSeoController@destroy')->name('api.auth.delete.gmz_seo');
Route::get('/gmz_seo/search/{search}', 'App\Http\Controllers\Api\Auth\GmzSeoController@search')->name('api.auth.search.gmz_seo');
Route::get('/gmz_room_availability', 'App\Http\Controllers\Api\Auth\GmzRoomAvailabilityController@index')->name('api.auth.index.gmz_room_availability');
Route::get('/gmz_room_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzRoomAvailabilityController@show')->name('api.auth.show.gmz_room_availability');
Route::post('/gmz_room_availability', 'App\Http\Controllers\Api\Auth\GmzRoomAvailabilityController@store')->name('api.auth.store.gmz_room_availability');
Route::put('/gmz_room_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzRoomAvailabilityController@update')->name('api.auth.update.gmz_room_availability');
Route::delete('/gmz_room_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzRoomAvailabilityController@destroy')->name('api.auth.delete.gmz_room_availability');
Route::get('/gmz_room_availability/search/{search}', 'App\Http\Controllers\Api\Auth\GmzRoomAvailabilityController@search')->name('api.auth.search.gmz_room_availability');
Route::get('/gmz_room', 'App\Http\Controllers\Api\Auth\GmzRoomController@index')->name('api.auth.index.gmz_room');
Route::get('/gmz_room/{id}', 'App\Http\Controllers\Api\Auth\GmzRoomController@show')->name('api.auth.show.gmz_room');
Route::post('/gmz_room', 'App\Http\Controllers\Api\Auth\GmzRoomController@store')->name('api.auth.store.gmz_room');
Route::put('/gmz_room/{id}', 'App\Http\Controllers\Api\Auth\GmzRoomController@update')->name('api.auth.update.gmz_room');
Route::delete('/gmz_room/{id}', 'App\Http\Controllers\Api\Auth\GmzRoomController@destroy')->name('api.auth.delete.gmz_room');
Route::get('/gmz_room/search/{search}', 'App\Http\Controllers\Api\Auth\GmzRoomController@search')->name('api.auth.search.gmz_room');
Route::get('/gmz_post', 'App\Http\Controllers\Api\Auth\GmzPostController@index')->name('api.auth.index.gmz_post');
Route::get('/gmz_post/{id}', 'App\Http\Controllers\Api\Auth\GmzPostController@show')->name('api.auth.show.gmz_post');
Route::post('/gmz_post', 'App\Http\Controllers\Api\Auth\GmzPostController@store')->name('api.auth.store.gmz_post');
Route::put('/gmz_post/{id}', 'App\Http\Controllers\Api\Auth\GmzPostController@update')->name('api.auth.update.gmz_post');
Route::delete('/gmz_post/{id}', 'App\Http\Controllers\Api\Auth\GmzPostController@destroy')->name('api.auth.delete.gmz_post');
Route::get('/gmz_post/search/{search}', 'App\Http\Controllers\Api\Auth\GmzPostController@search')->name('api.auth.search.gmz_post');
Route::get('/gmz_page', 'App\Http\Controllers\Api\Auth\GmzPageController@index')->name('api.auth.index.gmz_page');
Route::get('/gmz_page/{id}', 'App\Http\Controllers\Api\Auth\GmzPageController@show')->name('api.auth.show.gmz_page');
Route::post('/gmz_page', 'App\Http\Controllers\Api\Auth\GmzPageController@store')->name('api.auth.store.gmz_page');
Route::put('/gmz_page/{id}', 'App\Http\Controllers\Api\Auth\GmzPageController@update')->name('api.auth.update.gmz_page');
Route::delete('/gmz_page/{id}', 'App\Http\Controllers\Api\Auth\GmzPageController@destroy')->name('api.auth.delete.gmz_page');
Route::get('/gmz_page/search/{search}', 'App\Http\Controllers\Api\Auth\GmzPageController@search')->name('api.auth.search.gmz_page');
Route::get('/gmz_order', 'App\Http\Controllers\Api\Auth\GmzOrderController@index')->name('api.auth.index.gmz_order');
Route::get('/gmz_order/{id}', 'App\Http\Controllers\Api\Auth\GmzOrderController@show')->name('api.auth.show.gmz_order');
Route::post('/gmz_order', 'App\Http\Controllers\Api\Auth\GmzOrderController@store')->name('api.auth.store.gmz_order');
Route::put('/gmz_order/{id}', 'App\Http\Controllers\Api\Auth\GmzOrderController@update')->name('api.auth.update.gmz_order');
Route::delete('/gmz_order/{id}', 'App\Http\Controllers\Api\Auth\GmzOrderController@destroy')->name('api.auth.delete.gmz_order');
Route::get('/gmz_order/search/{search}', 'App\Http\Controllers\Api\Auth\GmzOrderController@search')->name('api.auth.search.gmz_order');
Route::get('/gmz_options', 'App\Http\Controllers\Api\Auth\GmzOptionsController@index')->name('api.auth.index.gmz_options');
Route::get('/gmz_options/{id}', 'App\Http\Controllers\Api\Auth\GmzOptionsController@show')->name('api.auth.show.gmz_options');
Route::post('/gmz_options', 'App\Http\Controllers\Api\Auth\GmzOptionsController@store')->name('api.auth.store.gmz_options');
Route::put('/gmz_options/{id}', 'App\Http\Controllers\Api\Auth\GmzOptionsController@update')->name('api.auth.update.gmz_options');
Route::delete('/gmz_options/{id}', 'App\Http\Controllers\Api\Auth\GmzOptionsController@destroy')->name('api.auth.delete.gmz_options');
Route::get('/gmz_options/search/{search}', 'App\Http\Controllers\Api\Auth\GmzOptionsController@search')->name('api.auth.search.gmz_options');
Route::get('/gmz_notification', 'App\Http\Controllers\Api\Auth\GmzNotificationController@index')->name('api.auth.index.gmz_notification');
Route::get('/gmz_notification/{id}', 'App\Http\Controllers\Api\Auth\GmzNotificationController@show')->name('api.auth.show.gmz_notification');
Route::post('/gmz_notification', 'App\Http\Controllers\Api\Auth\GmzNotificationController@store')->name('api.auth.store.gmz_notification');
Route::put('/gmz_notification/{id}', 'App\Http\Controllers\Api\Auth\GmzNotificationController@update')->name('api.auth.update.gmz_notification');
Route::delete('/gmz_notification/{id}', 'App\Http\Controllers\Api\Auth\GmzNotificationController@destroy')->name('api.auth.delete.gmz_notification');
Route::get('/gmz_notification/search/{search}', 'App\Http\Controllers\Api\Auth\GmzNotificationController@search')->name('api.auth.search.gmz_notification');
Route::get('/gmz_meta', 'App\Http\Controllers\Api\Auth\GmzMetaController@index')->name('api.auth.index.gmz_meta');
Route::get('/gmz_meta/{id}', 'App\Http\Controllers\Api\Auth\GmzMetaController@show')->name('api.auth.show.gmz_meta');
Route::post('/gmz_meta', 'App\Http\Controllers\Api\Auth\GmzMetaController@store')->name('api.auth.store.gmz_meta');
Route::put('/gmz_meta/{id}', 'App\Http\Controllers\Api\Auth\GmzMetaController@update')->name('api.auth.update.gmz_meta');
Route::delete('/gmz_meta/{id}', 'App\Http\Controllers\Api\Auth\GmzMetaController@destroy')->name('api.auth.delete.gmz_meta');
Route::get('/gmz_meta/search/{search}', 'App\Http\Controllers\Api\Auth\GmzMetaController@search')->name('api.auth.search.gmz_meta');
Route::get('/gmz_menu_structure', 'App\Http\Controllers\Api\Auth\GmzMenuStructureController@index')->name('api.auth.index.gmz_menu_structure');
Route::get('/gmz_menu_structure/{id}', 'App\Http\Controllers\Api\Auth\GmzMenuStructureController@show')->name('api.auth.show.gmz_menu_structure');
Route::post('/gmz_menu_structure', 'App\Http\Controllers\Api\Auth\GmzMenuStructureController@store')->name('api.auth.store.gmz_menu_structure');
Route::put('/gmz_menu_structure/{id}', 'App\Http\Controllers\Api\Auth\GmzMenuStructureController@update')->name('api.auth.update.gmz_menu_structure');
Route::delete('/gmz_menu_structure/{id}', 'App\Http\Controllers\Api\Auth\GmzMenuStructureController@destroy')->name('api.auth.delete.gmz_menu_structure');
Route::get('/gmz_menu_structure/search/{search}', 'App\Http\Controllers\Api\Auth\GmzMenuStructureController@search')->name('api.auth.search.gmz_menu_structure');
Route::get('/gmz_menu', 'App\Http\Controllers\Api\Auth\GmzMenuController@index')->name('api.auth.index.gmz_menu');
Route::get('/gmz_menu/{id}', 'App\Http\Controllers\Api\Auth\GmzMenuController@show')->name('api.auth.show.gmz_menu');
Route::post('/gmz_menu', 'App\Http\Controllers\Api\Auth\GmzMenuController@store')->name('api.auth.store.gmz_menu');
Route::put('/gmz_menu/{id}', 'App\Http\Controllers\Api\Auth\GmzMenuController@update')->name('api.auth.update.gmz_menu');
Route::delete('/gmz_menu/{id}', 'App\Http\Controllers\Api\Auth\GmzMenuController@destroy')->name('api.auth.delete.gmz_menu');
Route::get('/gmz_menu/search/{search}', 'App\Http\Controllers\Api\Auth\GmzMenuController@search')->name('api.auth.search.gmz_menu');
Route::get('/gmz_media', 'App\Http\Controllers\Api\Auth\GmzMediaController@index')->name('api.auth.index.gmz_media');
Route::get('/gmz_media/{id}', 'App\Http\Controllers\Api\Auth\GmzMediaController@show')->name('api.auth.show.gmz_media');
Route::post('/gmz_media', 'App\Http\Controllers\Api\Auth\GmzMediaController@store')->name('api.auth.store.gmz_media');
Route::put('/gmz_media/{id}', 'App\Http\Controllers\Api\Auth\GmzMediaController@update')->name('api.auth.update.gmz_media');
Route::delete('/gmz_media/{id}', 'App\Http\Controllers\Api\Auth\GmzMediaController@destroy')->name('api.auth.delete.gmz_media');
Route::get('/gmz_media/search/{search}', 'App\Http\Controllers\Api\Auth\GmzMediaController@search')->name('api.auth.search.gmz_media');
Route::get('/gmz_language', 'App\Http\Controllers\Api\Auth\GmzLanguageController@index')->name('api.auth.index.gmz_language');
Route::get('/gmz_language/{id}', 'App\Http\Controllers\Api\Auth\GmzLanguageController@show')->name('api.auth.show.gmz_language');
Route::post('/gmz_language', 'App\Http\Controllers\Api\Auth\GmzLanguageController@store')->name('api.auth.store.gmz_language');
Route::put('/gmz_language/{id}', 'App\Http\Controllers\Api\Auth\GmzLanguageController@update')->name('api.auth.update.gmz_language');
Route::delete('/gmz_language/{id}', 'App\Http\Controllers\Api\Auth\GmzLanguageController@destroy')->name('api.auth.delete.gmz_language');
Route::get('/gmz_language/search/{search}', 'App\Http\Controllers\Api\Auth\GmzLanguageController@search')->name('api.auth.search.gmz_language');
Route::get('/gmz_hotel', 'App\Http\Controllers\Api\Auth\GmzHotelController@index')->name('api.auth.index.gmz_hotel');
Route::get('/gmz_hotel/{id}', 'App\Http\Controllers\Api\Auth\GmzHotelController@show')->name('api.auth.show.gmz_hotel');
Route::post('/gmz_hotel', 'App\Http\Controllers\Api\Auth\GmzHotelController@store')->name('api.auth.store.gmz_hotel');
Route::put('/gmz_hotel/{id}', 'App\Http\Controllers\Api\Auth\GmzHotelController@update')->name('api.auth.update.gmz_hotel');
Route::delete('/gmz_hotel/{id}', 'App\Http\Controllers\Api\Auth\GmzHotelController@destroy')->name('api.auth.delete.gmz_hotel');
Route::get('/gmz_hotel/search/{search}', 'App\Http\Controllers\Api\Auth\GmzHotelController@search')->name('api.auth.search.gmz_hotel');
Route::get('/gmz_earnings', 'App\Http\Controllers\Api\Auth\GmzEarningsController@index')->name('api.auth.index.gmz_earnings');
Route::get('/gmz_earnings/{id}', 'App\Http\Controllers\Api\Auth\GmzEarningsController@show')->name('api.auth.show.gmz_earnings');
Route::post('/gmz_earnings', 'App\Http\Controllers\Api\Auth\GmzEarningsController@store')->name('api.auth.store.gmz_earnings');
Route::put('/gmz_earnings/{id}', 'App\Http\Controllers\Api\Auth\GmzEarningsController@update')->name('api.auth.update.gmz_earnings');
Route::delete('/gmz_earnings/{id}', 'App\Http\Controllers\Api\Auth\GmzEarningsController@destroy')->name('api.auth.delete.gmz_earnings');
Route::get('/gmz_earnings/search/{search}', 'App\Http\Controllers\Api\Auth\GmzEarningsController@search')->name('api.auth.search.gmz_earnings');
Route::get('/gmz_coupon', 'App\Http\Controllers\Api\Auth\GmzCouponController@index')->name('api.auth.index.gmz_coupon');
Route::get('/gmz_coupon/{id}', 'App\Http\Controllers\Api\Auth\GmzCouponController@show')->name('api.auth.show.gmz_coupon');
Route::post('/gmz_coupon', 'App\Http\Controllers\Api\Auth\GmzCouponController@store')->name('api.auth.store.gmz_coupon');
Route::put('/gmz_coupon/{id}', 'App\Http\Controllers\Api\Auth\GmzCouponController@update')->name('api.auth.update.gmz_coupon');
Route::delete('/gmz_coupon/{id}', 'App\Http\Controllers\Api\Auth\GmzCouponController@destroy')->name('api.auth.delete.gmz_coupon');
Route::get('/gmz_coupon/search/{search}', 'App\Http\Controllers\Api\Auth\GmzCouponController@search')->name('api.auth.search.gmz_coupon');
Route::get('/gmz_comment', 'App\Http\Controllers\Api\Auth\GmzCommentController@index')->name('api.auth.index.gmz_comment');
Route::get('/gmz_comment/{id}', 'App\Http\Controllers\Api\Auth\GmzCommentController@show')->name('api.auth.show.gmz_comment');
Route::post('/gmz_comment', 'App\Http\Controllers\Api\Auth\GmzCommentController@store')->name('api.auth.store.gmz_comment');
Route::put('/gmz_comment/{id}', 'App\Http\Controllers\Api\Auth\GmzCommentController@update')->name('api.auth.update.gmz_comment');
Route::delete('/gmz_comment/{id}', 'App\Http\Controllers\Api\Auth\GmzCommentController@destroy')->name('api.auth.delete.gmz_comment');
Route::get('/gmz_comment/search/{search}', 'App\Http\Controllers\Api\Auth\GmzCommentController@search')->name('api.auth.search.gmz_comment');
Route::get('/gmz_car_availability', 'App\Http\Controllers\Api\Auth\GmzCarAvailabilityController@index')->name('api.auth.index.gmz_car_availability');
Route::get('/gmz_car_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzCarAvailabilityController@show')->name('api.auth.show.gmz_car_availability');
Route::post('/gmz_car_availability', 'App\Http\Controllers\Api\Auth\GmzCarAvailabilityController@store')->name('api.auth.store.gmz_car_availability');
Route::put('/gmz_car_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzCarAvailabilityController@update')->name('api.auth.update.gmz_car_availability');
Route::delete('/gmz_car_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzCarAvailabilityController@destroy')->name('api.auth.delete.gmz_car_availability');
Route::get('/gmz_car_availability/search/{search}', 'App\Http\Controllers\Api\Auth\GmzCarAvailabilityController@search')->name('api.auth.search.gmz_car_availability');
Route::get('/gmz_car', 'App\Http\Controllers\Api\Auth\GmzCarController@index')->name('api.auth.index.gmz_car');
Route::get('/gmz_car/{id}', 'App\Http\Controllers\Api\Auth\GmzCarController@show')->name('api.auth.show.gmz_car');
Route::post('/gmz_car', 'App\Http\Controllers\Api\Auth\GmzCarController@store')->name('api.auth.store.gmz_car');
Route::put('/gmz_car/{id}', 'App\Http\Controllers\Api\Auth\GmzCarController@update')->name('api.auth.update.gmz_car');
Route::delete('/gmz_car/{id}', 'App\Http\Controllers\Api\Auth\GmzCarController@destroy')->name('api.auth.delete.gmz_car');
Route::get('/gmz_car/search/{search}', 'App\Http\Controllers\Api\Auth\GmzCarController@search')->name('api.auth.search.gmz_car');
Route::get('/gmz_beauty_availability', 'App\Http\Controllers\Api\Auth\GmzBeautyAvailabilityController@index')->name('api.auth.index.gmz_beauty_availability');
Route::get('/gmz_beauty_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzBeautyAvailabilityController@show')->name('api.auth.show.gmz_beauty_availability');
Route::post('/gmz_beauty_availability', 'App\Http\Controllers\Api\Auth\GmzBeautyAvailabilityController@store')->name('api.auth.store.gmz_beauty_availability');
Route::put('/gmz_beauty_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzBeautyAvailabilityController@update')->name('api.auth.update.gmz_beauty_availability');
Route::delete('/gmz_beauty_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzBeautyAvailabilityController@destroy')->name('api.auth.delete.gmz_beauty_availability');
Route::get('/gmz_beauty_availability/search/{search}', 'App\Http\Controllers\Api\Auth\GmzBeautyAvailabilityController@search')->name('api.auth.search.gmz_beauty_availability');
Route::get('/gmz_beauty', 'App\Http\Controllers\Api\Auth\GmzBeautyController@index')->name('api.auth.index.gmz_beauty');
Route::get('/gmz_beauty/{id}', 'App\Http\Controllers\Api\Auth\GmzBeautyController@show')->name('api.auth.show.gmz_beauty');
Route::post('/gmz_beauty', 'App\Http\Controllers\Api\Auth\GmzBeautyController@store')->name('api.auth.store.gmz_beauty');
Route::put('/gmz_beauty/{id}', 'App\Http\Controllers\Api\Auth\GmzBeautyController@update')->name('api.auth.update.gmz_beauty');
Route::delete('/gmz_beauty/{id}', 'App\Http\Controllers\Api\Auth\GmzBeautyController@destroy')->name('api.auth.delete.gmz_beauty');
Route::get('/gmz_beauty/search/{search}', 'App\Http\Controllers\Api\Auth\GmzBeautyController@search')->name('api.auth.search.gmz_beauty');
Route::get('/gmz_apartment_availability', 'App\Http\Controllers\Api\Auth\GmzApartmentAvailabilityController@index')->name('api.auth.index.gmz_apartment_availability');
Route::get('/gmz_apartment_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzApartmentAvailabilityController@show')->name('api.auth.show.gmz_apartment_availability');
Route::post('/gmz_apartment_availability', 'App\Http\Controllers\Api\Auth\GmzApartmentAvailabilityController@store')->name('api.auth.store.gmz_apartment_availability');
Route::put('/gmz_apartment_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzApartmentAvailabilityController@update')->name('api.auth.update.gmz_apartment_availability');
Route::delete('/gmz_apartment_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzApartmentAvailabilityController@destroy')->name('api.auth.delete.gmz_apartment_availability');
Route::get('/gmz_apartment_availability/search/{search}', 'App\Http\Controllers\Api\Auth\GmzApartmentAvailabilityController@search')->name('api.auth.search.gmz_apartment_availability');
Route::get('/gmz_apartment', 'App\Http\Controllers\Api\Auth\GmzApartmentController@index')->name('api.auth.index.gmz_apartment');
Route::get('/gmz_apartment/{id}', 'App\Http\Controllers\Api\Auth\GmzApartmentController@show')->name('api.auth.show.gmz_apartment');
Route::post('/gmz_apartment', 'App\Http\Controllers\Api\Auth\GmzApartmentController@store')->name('api.auth.store.gmz_apartment');
Route::put('/gmz_apartment/{id}', 'App\Http\Controllers\Api\Auth\GmzApartmentController@update')->name('api.auth.update.gmz_apartment');
Route::delete('/gmz_apartment/{id}', 'App\Http\Controllers\Api\Auth\GmzApartmentController@destroy')->name('api.auth.delete.gmz_apartment');
Route::get('/gmz_apartment/search/{search}', 'App\Http\Controllers\Api\Auth\GmzApartmentController@search')->name('api.auth.search.gmz_apartment');
Route::get('/gmz_agent_relation', 'App\Http\Controllers\Api\Auth\GmzAgentRelationController@index')->name('api.auth.index.gmz_agent_relation');
Route::get('/gmz_agent_relation/{id}', 'App\Http\Controllers\Api\Auth\GmzAgentRelationController@show')->name('api.auth.show.gmz_agent_relation');
Route::post('/gmz_agent_relation', 'App\Http\Controllers\Api\Auth\GmzAgentRelationController@store')->name('api.auth.store.gmz_agent_relation');
Route::put('/gmz_agent_relation/{id}', 'App\Http\Controllers\Api\Auth\GmzAgentRelationController@update')->name('api.auth.update.gmz_agent_relation');
Route::delete('/gmz_agent_relation/{id}', 'App\Http\Controllers\Api\Auth\GmzAgentRelationController@destroy')->name('api.auth.delete.gmz_agent_relation');
Route::get('/gmz_agent_relation/search/{search}', 'App\Http\Controllers\Api\Auth\GmzAgentRelationController@search')->name('api.auth.search.gmz_agent_relation');
Route::get('/gmz_agent_availability', 'App\Http\Controllers\Api\Auth\GmzAgentAvailabilityController@index')->name('api.auth.index.gmz_agent_availability');
Route::get('/gmz_agent_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzAgentAvailabilityController@show')->name('api.auth.show.gmz_agent_availability');
Route::post('/gmz_agent_availability', 'App\Http\Controllers\Api\Auth\GmzAgentAvailabilityController@store')->name('api.auth.store.gmz_agent_availability');
Route::put('/gmz_agent_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzAgentAvailabilityController@update')->name('api.auth.update.gmz_agent_availability');
Route::delete('/gmz_agent_availability/{id}', 'App\Http\Controllers\Api\Auth\GmzAgentAvailabilityController@destroy')->name('api.auth.delete.gmz_agent_availability');
Route::get('/gmz_agent_availability/search/{search}', 'App\Http\Controllers\Api\Auth\GmzAgentAvailabilityController@search')->name('api.auth.search.gmz_agent_availability');
Route::get('/gmz_agent', 'App\Http\Controllers\Api\Auth\GmzAgentController@index')->name('api.auth.index.gmz_agent');
Route::get('/gmz_agent/{id}', 'App\Http\Controllers\Api\Auth\GmzAgentController@show')->name('api.auth.show.gmz_agent');
Route::post('/gmz_agent', 'App\Http\Controllers\Api\Auth\GmzAgentController@store')->name('api.auth.store.gmz_agent');
Route::put('/gmz_agent/{id}', 'App\Http\Controllers\Api\Auth\GmzAgentController@update')->name('api.auth.update.gmz_agent');
Route::delete('/gmz_agent/{id}', 'App\Http\Controllers\Api\Auth\GmzAgentController@destroy')->name('api.auth.delete.gmz_agent');
Route::get('/gmz_agent/search/{search}', 'App\Http\Controllers\Api\Auth\GmzAgentController@search')->name('api.auth.search.gmz_agent');
Route::get('/failed_jobs', 'App\Http\Controllers\Api\Auth\FailedJobsController@index')->name('api.auth.index.failed_jobs');
Route::get('/failed_jobs/{id}', 'App\Http\Controllers\Api\Auth\FailedJobsController@show')->name('api.auth.show.failed_jobs');
Route::post('/failed_jobs', 'App\Http\Controllers\Api\Auth\FailedJobsController@store')->name('api.auth.store.failed_jobs');
Route::put('/failed_jobs/{id}', 'App\Http\Controllers\Api\Auth\FailedJobsController@update')->name('api.auth.update.failed_jobs');
Route::delete('/failed_jobs/{id}', 'App\Http\Controllers\Api\Auth\FailedJobsController@destroy')->name('api.auth.delete.failed_jobs');
Route::get('/failed_jobs/search/{search}', 'App\Http\Controllers\Api\Auth\FailedJobsController@search')->name('api.auth.search.failed_jobs');

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


Route::get('/gerges', function(){
    return "gerges";
});
