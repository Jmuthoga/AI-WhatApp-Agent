<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsappController;


Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| WhatsApp Webhook Routes
| (Used by Meta to send messages to your Laravel app)
|--------------------------------------------------------------------------
*/

Route::get('/webhook', [WhatsappController::class, 'verify']);   // GET for verification
Route::post('/webhook', [WhatsappController::class, 'webhook']); // POST for incoming messages