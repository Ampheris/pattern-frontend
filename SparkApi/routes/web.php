<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/login', [App\Http\Controllers\Users\LoginController::class, 'index'])->name('login');
Route::get('/loginGithub', [App\Http\Controllers\Users\LoginController::class, 'loginGithub'])->name('loginGithub');

/*
 * bikeride Route: You get here after you choose a bike on the map. If the bike is available you can click on start a ride.
 */
Route::get('/bikeride/{bike_id}', [App\Http\Controllers\Users\BikeRideController::class, 'index'])->name('bikeride');
Route::get('/startbikeride/{bike_id}', [App\Http\Controllers\Users\BikeRideController::class, 'startBikeRide'])->name('startBikeRide');
Route::get('/stopbikeride', [App\Http\Controllers\Users\BikeRideController::class, 'stopBikeRide'])->name('stopBikeRide');

/*
 * history Route: Shows a list of the users bikehistory
 */
Route::get('/history', [App\Http\Controllers\Users\HistoryController::class, 'index'])->name('history');
// Route::get('/history/{historyId}', [App\Http\Controllers\Users\HistoryController::class, 'showSingleHistory'])->name('singleHistory');


/*
 * order Route: Shows a list of the users orders
 */
Route::get('/orders', [App\Http\Controllers\Users\OrderController::class, 'index'])->name('orders');
// Route::get('/orders/{orderId}', [App\Http\Controllers\Users\OrderController::class, 'showSingleOrder'])->name('singleOrder');


/*
 * Profile
 */
Route::get('/profile', [App\Http\Controllers\Users\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/subscription', [App\Http\Controllers\Users\ProfileController::class, 'subscription'])->name('subscription');
Route::post('/profile/subscription', [App\Http\Controllers\Users\ProfileController::class, 'manageSubscription'])->name('manageSubscription');
Route::post('/profile/subscription/stop', [App\Http\Controllers\Users\ProfileController::class, 'endSubscription'])->name('endSubscription');
Route::get('/profile/subscription-form', [App\Http\Controllers\Users\ProfileController::class, 'showSubscriptionPayForm'])->name('showSubscriptionPayForm');
Route::get('/profile/balance', [App\Http\Controllers\Users\ProfileController::class, 'balance'])->name('balance');
// Route::get('/profile/balance-form', [App\Http\Controllers\Users\ProfileController::class, 'showBalanceForm'])->name('showBalanceForm');
Route::post('/profile/balance', [App\Http\Controllers\Users\ProfileController::class, 'addToBalance'])->name('addToBalance');

// Route::get('/history/{historyId}', [App\Http\Controllers\Users\HistoryController::class, 'showSingleHistory'])->name('singleHistory');


/*
 * cities admin route: Shows a list of the cities and edit or add a city.
 */
 Route::get('/admin', [App\Http\Controllers\Admin\MapController::class, 'index'])->name('adminMap');

/*
 * login admin route
 */
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('login');


/*
//  * cities admin route: Shows a list of the cities and edit or add a city.
*/
Route::get('/admin/cities', [App\Http\Controllers\Admin\CitiesController::class, 'index'])->name('cities');
Route::post('/admin/cities', [App\Http\Controllers\Admin\CitiesController::class, 'storeCity'])->name('storeCity');
Route::get('/admin/cities/create', [App\Http\Controllers\Admin\CitiesController::class, 'createCity'])->name('createCity');

Route::get('/admin/cities/update/{cityId}', [App\Http\Controllers\Admin\CitiesController::class, 'showSingleCity'])->name('showSingleCity');
Route::post('/admin/cities/update', [App\Http\Controllers\Admin\CitiesController::class, 'storeNewCity'])->name('storeNewCity');


/*
 * Admin user route
*/
Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users');
Route::get('/admin/user', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users');


/*
 * Admin bike route
*/
Route::get('/admin/bikes', [App\Http\Controllers\Admin\BikesController::class, 'index'])->name('bikes');
Route::get('/admin/bikes/create', [App\Http\Controllers\Admin\BikesController::class, 'createBike'])->name('createBike');
Route::get('/admin/bikes/{bikeId}', [App\Http\Controllers\Admin\BikesController::class, 'showSingleBike'])->name('showSingleBike');
Route::post('/admin/bikes/update', [App\Http\Controllers\Admin\BikesController::class, 'storeNewBike'])->name('storeNewBike');
Route::post('/admin/bikes/delete', [App\Http\Controllers\Admin\BikesController::class, 'destroyBike'])->name('destroyBike');
Route::post('/admin/bikes/create', [App\Http\Controllers\Admin\BikesController::class, 'storeBike'])->name('storeBike');


/*
 * Admin Parkingspace route
*/
Route::get('/admin/parkingspace', [App\Http\Controllers\Admin\ParkingController::class, 'index'])->name('parking');
Route::get('/admin/parkingspace/create', [App\Http\Controllers\Admin\ParkingController::class, 'createParkingspace'])->name('createParkingspace');
Route::get('/admin/parkingspace/{parkingId}', [App\Http\Controllers\Admin\ParkingController::class, 'showSingleParkingspace'])->name('showSingleParkingspace');
Route::post('/admin/parkingspace/update', [App\Http\Controllers\Admin\ParkingController::class, 'storeUpdatedParkingspace'])->name('storeUpdatedParkingspace');
Route::post('/admin/parkingspace/create', [App\Http\Controllers\Admin\ParkingController::class, 'storeNewParkingspace'])->name('storeNewParkingspace');


/*
 * Admin Chargingstation route
*/
Route::get('/admin/chargingstations', [App\Http\Controllers\Admin\ChargingstationsController::class, 'index'])->name('chargingstations');
Route::get('/admin/chargingstations/create', [App\Http\Controllers\Admin\ChargingstationsController::class, 'createChargingstation'])->name('createChargingstation');
Route::get('/admin/chargingstations/{chargingstationId}', [App\Http\Controllers\Admin\ChargingstationsController::class, 'showSingleChargingstation'])->name('showSingleChargingstation');
Route::post('/admin/chargingstations/update', [App\Http\Controllers\Admin\ChargingstationsController::class, 'storeUpdatedChargingstations'])->name('storeUpdatedChargingstations');
Route::post('/admin/chargingstations/create', [App\Http\Controllers\Admin\ChargingstationsController::class, 'storeNewChargingstation'])->name('storeNewChargingstation');


Auth::routes();
