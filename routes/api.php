<?php
use App\Http\Controllers\Api\ItemController;
use Illuminate\Support\Facades\Route;

Route::apiResource('items', ItemController::class);
// Route::get('/items-test', function () {
//     return response()->json(['message' => 'API Test Berhasil!']);
// });