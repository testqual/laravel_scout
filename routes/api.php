<?php

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AnalyticsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/search', function (Request $request) {
    return Order::search($request->search)->get();
});

Route::get('/orders', function (Request $request) {
    return Order::search($request->input('query'))->paginate(15);
});

Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');

Route::get('items-lists', [SearchController::class, 'index'])->name('items-lists');

Route::post('create-item', [SearchController::class, 'create'])->name('create-item');
