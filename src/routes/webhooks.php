<?php
use Illuminate\Support\Facades\Route;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Http\Controllers\Webhooks\Messages\MessageCreatedController;

Route::prefix('messages')
    ->name('messages.')
    ->group(function () {
        Route::prefix("{message}")->group(function () {
            Route::post("created", MessageCreatedController::class)->name('created');
        });
    });