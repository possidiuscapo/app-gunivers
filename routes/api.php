<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FormationSubscriberController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterSubscriberController;
use App\Http\Controllers\NewsletterUnsubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackComposantController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceSousServiceController;
use App\Http\Controllers\SousServiceController;
use App\Http\Controllers\TypesPrestationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('',[LoginController::class, 'login']);

// PacksComposant
Route::get('pack-composants', [PackComposantController::class, 'index']);

// Contact
Route::post('/contact/create', [ContactController::class,'store']);

// Newsletter
Route::post('/newsletter/create', [NewsletterController::class, 'store']);

// Newsletter Subscriber
Route::post('/newsletterSubscriber/create', [NewsletterSubscriberController::class, 'store']);

// Newsletter Unsubscription
Route::post('/newsletterUnsubscription/create', [NewsletterUnsubscriptionController::class, 'store']);

// Formation
Route::get('formations', [FormationController::class, 'index']);
Route::get('/formation/{id}', [FormationController::class, 'show']);
Route::get('/getformations', [FormationController::class, 'getformation']);

// Formation Subscriber
Route::post('/formationSubscriber/create', [FormationSubscriberController::class, 'store']);

// Services
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);

// Sous Services
Route::get('/servicessousservices', [ServiceSousServiceController::class, 'index']);
Route::get('/servicessousservices/{id}', [ServiceSousServiceController::class, 'show']);

// Partenaires
Route::get('/partenaires', [PartenaireController::class, 'index']);

// Prestations
Route::get('/prestations', [PrestationController::class, 'index']);
Route::get('/prestation/{id}', [PrestationController::class, 'show']);

// Types Prestations
Route::get('/typeprestations', [TypesPrestationController::class, 'index']);
Route::get('/typeprestations/{id}', [TypesPrestationController::class, 'show']);

// Pays
Route::get('pays', [PaysController::class, 'index']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






