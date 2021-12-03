<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

define('BASE_URL', 'http://localhost:8080/sparkapi/v1/');


/*
 * / Route: Shows map
 */
Route::get('/', [App\Http\Controllers\Users\MapController::class, 'index'])->name('map');

/*
 * bikeride Route: You get here after you choose a bike on the map. If the bike is available you can click on start a ride.
 */
Route::get('/bikeride/{bike_id}', [App\Http\Controllers\Users\BikeRideController::class, 'index'])->name('bikeride');
Route::post('/startbikeride', [App\Http\Controllers\Users\BikeRideController::class, 'startBikeRide'])->name('startBikeRide');

/*
 * history Route: Shows a list of the users bikehistory
 */
Route::get('/history', [App\Http\Controllers\Users\HistoryController::class, 'index'])->name('history');
Route::get('/history/{historyId}', [App\Http\Controllers\Users\HistoryController::class, 'showSingleHistory'])->name('singleHistory');

/*
 * cities admin route: Shows a list of the cities and edit or add a city.
 */
 Route::get('/admin', [App\Http\Controllers\Admin\MapController::class, 'index'])->name('map');

Route::get('/admin/cities', [App\Http\Controllers\Admin\CitiesController::class, 'index'])->name('cities');
Route::get('/admin/cities/create', [App\Http\Controllers\Admin\CitiesController::class, 'create'])->name('create');
Route::get('/admin/cities/change', [App\Http\Controllers\Admin\CitiesController::class, 'changeACity'])->name('changeACity');
Route::post('/admin/cities', [App\Http\Controllers\Admin\CitiesController::class, 'store'])->name('store');

Route::get('/admin/cities/change/{city_id}', [App\Http\Controllers\Admin\CitiesController::class, 'showSingleCity'])->name('showSingleCity');


Auth::routes();
