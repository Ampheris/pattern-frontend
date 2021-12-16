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

// define('BASE_URL', 'http://localhost:8080/sparkapi/v1/');


/*
 * / Route: Shows map
 */
Route::get('/', [App\Http\Controllers\Users\MapController::class, 'index'])->name('map')->middleware('authUser');
/*
 * / Route: Login
 */
Route::get('/login', [App\Http\Controllers\Users\LoginController::class, 'index'])->name('login');
Route::get('/loginGithub', [App\Http\Controllers\Users\LoginController::class, 'loginGithub'])->name('loginGithub');

/*
 * bikeride Route: You get here after you choose a bike on the map. If the bike is available you can click on start a ride.
 */
Route::get('/bikeride/{bike_id}', [App\Http\Controllers\Users\BikeRideController::class, 'index'])->name('bikeride')->middleware('authUser');
Route::get('/startbikeride/{bike_id}', [App\Http\Controllers\Users\BikeRideController::class, 'startBikeRide'])->name('startBikeRide')->middleware('authUser');
Route::get('/stopbikeride', [App\Http\Controllers\Users\BikeRideController::class, 'stopBikeRide'])->name('stopBikeRide')->middleware('authUser');

/*
 * history Route: Shows a list of the users bikehistory
 */
Route::get('/history', [App\Http\Controllers\Users\HistoryController::class, 'index'])->name('history')->middleware('authUser');
// Route::get('/history/{historyId}', [App\Http\Controllers\Users\HistoryController::class, 'showSingleHistory'])->name('singleHistory');


/*
 * order Route: Shows a list of the users orders
 */
Route::get('/orders', [App\Http\Controllers\Users\OrderController::class, 'index'])->name('orders')->middleware('authUser');
// Route::get('/orders/{orderId}', [App\Http\Controllers\Users\OrderController::class, 'showSingleOrder'])->name('singleOrder');


/*
 * Profile
 */
Route::get('/profile', [App\Http\Controllers\Users\ProfileController::class, 'index'])->name('profile')->middleware('authUser');
Route::get('/profile/subscription', [App\Http\Controllers\Users\ProfileController::class, 'subscription'])->name('subscription')->middleware('authUser');
Route::post('/profile/subscription', [App\Http\Controllers\Users\ProfileController::class, 'manageSubscription'])->name('manageSubscription')->middleware('authUser');
Route::post('/profile/subscription/stop', [App\Http\Controllers\Users\ProfileController::class, 'endSubscription'])->name('endSubscription')->middleware('authUser');
Route::get('/profile/subscription-form', [App\Http\Controllers\Users\ProfileController::class, 'showSubscriptionPayForm'])->name('showSubscriptionPayForm')->middleware('authUser');
Route::get('/profile/balance', [App\Http\Controllers\Users\ProfileController::class, 'balance'])->name('balance')->middleware('authUser');
// Route::get('/profile/balance-form', [App\Http\Controllers\Users\ProfileController::class, 'showBalanceForm'])->name('showBalanceForm');
Route::post('/profile/balance', [App\Http\Controllers\Users\ProfileController::class, 'addToBalance'])->name('addToBalance')->middleware('authUser');

// Route::get('/history/{historyId}', [App\Http\Controllers\Users\HistoryController::class, 'showSingleHistory'])->name('singleHistory');


/*
 * cities admin route: Shows a list of the cities and edit or add a city.
 */
 Route::get('/admin', [App\Http\Controllers\Admin\MapController::class, 'index'])->name('adminMap')->middleware('authAdmin');

/*
 * login admin route
 */
// Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('login');


/*
//  * cities admin route: Shows a list of the cities and edit or add a city.
*/
Route::get('/admin/cities', [App\Http\Controllers\Admin\CitiesController::class, 'index'])->name('cities')->middleware('authAdmin');
Route::post('/admin/cities', [App\Http\Controllers\Admin\CitiesController::class, 'storeCity'])->name('storeCity')->middleware('authAdmin');
Route::get('/admin/cities/create', [App\Http\Controllers\Admin\CitiesController::class, 'createCity'])->name('createCity')->middleware('authAdmin');

Route::get('/admin/cities/update/{cityId}', [App\Http\Controllers\Admin\CitiesController::class, 'showSingleCity'])->name('showSingleCity')->middleware('authAdmin');
Route::post('/admin/cities/update', [App\Http\Controllers\Admin\CitiesController::class, 'storeNewCity'])->name('storeNewCity')->middleware('authAdmin');


/*
 * Admin user route
*/
Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users')->middleware('authAdmin');
Route::get('/admin/user', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users')->middleware('authAdmin');


/*
 * Admin bike route
*/
Route::get('/admin/bikes', [App\Http\Controllers\Admin\BikesController::class, 'index'])->name('bikes')->middleware('authAdmin');
Route::get('/admin/bikes/create', [App\Http\Controllers\Admin\BikesController::class, 'createBike'])->name('createBike')->middleware('authAdmin');
Route::get('/admin/bikes/{bikeId}', [App\Http\Controllers\Admin\BikesController::class, 'showSingleBike'])->name('showSingleBike')->middleware('authAdmin');
Route::post('/admin/bikes/update', [App\Http\Controllers\Admin\BikesController::class, 'storeNewBike'])->name('storeNewBike')->middleware('authAdmin');
Route::post('/admin/bikes/delete', [App\Http\Controllers\Admin\BikesController::class, 'destroyBike'])->name('destroyBike')->middleware('authAdmin');
Route::post('/admin/bikes/create', [App\Http\Controllers\Admin\BikesController::class, 'storeBike'])->name('storeBike')->middleware('authAdmin');


/*
 * Admin Parkingspace route
*/
Route::get('/admin/parkingspace', [App\Http\Controllers\Admin\ParkingController::class, 'index'])->name('parking')->middleware('authAdmin');
Route::get('/admin/parkingspace/create', [App\Http\Controllers\Admin\ParkingController::class, 'createParkingspace'])->name('createParkingspace')->middleware('authAdmin');
Route::get('/admin/parkingspace/{parkingId}', [App\Http\Controllers\Admin\ParkingController::class, 'showSingleParkingspace'])->name('showSingleParkingspace')->middleware('authAdmin');
Route::post('/admin/parkingspace/update', [App\Http\Controllers\Admin\ParkingController::class, 'storeUpdatedParkingspace'])->name('storeUpdatedParkingspace')->middleware('authAdmin');
Route::post('/admin/parkingspace/create', [App\Http\Controllers\Admin\ParkingController::class, 'storeNewParkingspace'])->name('storeNewParkingspace')->middleware('authAdmin');


/*
 * Admin Chargingstation route
*/
Route::get('/admin/chargingstations', [App\Http\Controllers\Admin\ChargingstationsController::class, 'index'])->name('chargingstations')->middleware('authAdmin');
Route::get('/admin/chargingstations/create', [App\Http\Controllers\Admin\ChargingstationsController::class, 'createChargingstation'])->name('createChargingstation')->middleware('authAdmin');
Route::get('/admin/chargingstations/{chargingstationId}', [App\Http\Controllers\Admin\ChargingstationsController::class, 'showSingleChargingstation'])->name('showSingleChargingstation')->middleware('authAdmin');
Route::post('/admin/chargingstations/update', [App\Http\Controllers\Admin\ChargingstationsController::class, 'storeUpdatedChargingstations'])->name('storeUpdatedChargingstations')->middleware('authAdmin');
Route::post('/admin/chargingstations/create', [App\Http\Controllers\Admin\ChargingstationsController::class, 'storeNewChargingstation'])->name('storeNewChargingstation')->middleware('authAdmin');


Auth::routes();
