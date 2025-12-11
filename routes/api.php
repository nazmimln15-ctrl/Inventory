<?php
use App\Http\Controllers\Api\ItemController;
use Illuminate\Support\Facades\Route;


Route::apiResource('items', App\Http\Controllers\Api\ItemController::class);

