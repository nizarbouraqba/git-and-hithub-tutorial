<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TestMailController;


/*
|----------------------------------------------------------------------  
| Routes Web  
|----------------------------------------------------------------------  
|  
| Ici, tu peux enregistrer les routes web pour ton application.  
| Les routes sont chargées par le RouteServiceProvider dans un groupe  
| qui contient le middleware "web".  
|  
*/

Route::name('members.')->controller(MemberController::class)->group(function () {
    // Étape 1 - Informations personnelles
    Route::get('/', 'showStep1')->name('step1');
    Route::post('/', 'storeStep1')->name('storeStep1');
    
    // Étape 2 - Téléversement des documents
    Route::get('/documents', 'showStep2')->name('step2');
    Route::post('/documents', 'storeStep2')->name('storeStep2');
    
    // Étape 3 - Confirmation des données
    Route::get('/confirmation', 'showConfirmation')->name('confirmation');
    Route::post('/submit', 'submitFinal')->name('submit');
    
    // API pour les options du formulaire (AJAX)
    Route::get('/api/inscription/options', 'getFormOptions')->name('options');
});

// Route for payment page
Route::match(['get', 'post'], '/payment', [MemberController::class, 'showPaymentPage'])->name('members.payment');

// Route to submit the payment
Route::post('/payment-submit', [MemberController::class, 'submitPayment'])->name('members.payment.submit');

// Route to redirect to success page
Route::get('/payment-success', [MemberController::class, 'paymentSuccess'])->name('members.success');


// Routes pages statiques
Route::view('/apropos', 'form.apropos')->name('apropos');
Route::view('/contact', 'form.contact')->name('contact');

Route::get('/test-success', function () {
    return view('form.success');
});




// Route::post('/send-verification-code', [TestMailController::class, 'sendVerificationCode']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);







Route::get('/members', [MemberController::class, 'showMembersList'])->name('members.list');
Route::get('/members/{id}', [MemberController::class, 'show'])->name('members.show');
Route::get('/members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{id}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('members.destroy');






Route::post('/create-stripe-session', [App\Http\Controllers\PaymentController::class, 'createStripeSession']);
Route::get('/paypal-success', [App\Http\Controllers\PaymentController::class, 'paypalSuccess']);







