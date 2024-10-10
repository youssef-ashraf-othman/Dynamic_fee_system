<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeePresetController;
use App\Http\Controllers\FeePercentageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ThresholdController;

//Routes To Controllers
Route::resource('fee-presets', FeePresetController::class);
Route::resource('services', ServiceController::class);
Route::resource('thresholds', ThresholdController::class);
Route::resource('fee_percentages', FeePercentageController::class);

//Routes To Every Page
Route::resource('fee_percentages', FeePercentageController::class);
Route::resource('fee_presets', FeePresetController::class);
Route::resource('services', ServiceController::class);
Route::resource('thresholds', ThresholdController::class);

Route::get('fee_presets/{preset}/services', function ($preset) {
    $services = FeePreset::find($preset)->services; // Adjust based on your relationship in FeePreset
    return response()->json($services);
});

Route::get('/get-services/{presetId}', [FeePercentageController::class, 'getServices']);



//Route to welcome page 
Route::get('/', function () {
    return view('welcome');
});
