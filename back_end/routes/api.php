<?php
use App\Http\Controllers\OffreController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::resource('offres', OffreController::class);

//public routes
Route::post('/register', [ UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/offres', [OffreController::class, 'index']);
Route::get('/demandes', [DemandeController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/offres/{id}', [OffreController::class, 'show']);
Route::get('/demandes/{id}', [DemandeController::class, 'show']);
Route::get('/offres/search/{titre}', [OffreController::class, 'search']);
Route::get('/demandes/search/{titre_de}', [DemandeController::class, 'search']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/offres', [OffreController::class, 'store']);
    Route::post('/demandes', [DemandeController::class, 'store']);
    Route::put('/offres/{id}', [OffreController::class, 'update']);
    Route::put('/demandes/{id}', [DemandeController::class, 'update']);
    Route::delete('/offres/{id}', [OffreController::class, 'destroy']);
    Route::delete('/demandes/{id}', [DemandeController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
