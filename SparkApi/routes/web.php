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

Route::get('/', function () {
    return view('welcome');
});

/*
 * / Route: Shows map
 */
Route::get('/', [App\Http\Controllers\MapController::class, 'index'])->name('map');

/*
 * bikeride Route: You get here after you choose a bike on the map. If the bike is available you can click on start a ride.
 */
Route::get('/bikeride/{bike_id}', [App\Http\Controllers\BikeRideController::class, 'index'])->name('bikeride');
Route::post('/startbikeride', [App\Http\Controllers\BikeRideController::class, 'startBikeRide'])->name('startBikeRide');

/*
 * history Route: Shows a list of the users bikehistory
 */
Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
Route::get('/history/{historyId}', [App\Http\Controllers\HistoryController::class, 'showSingleHistory'])->name('singleHistory');


Auth::routes();
