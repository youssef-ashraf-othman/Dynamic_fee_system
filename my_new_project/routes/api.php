<?php
use App\Http\Controllers\FeePercentageController;

Route::get('/presets/{preset}/services', function ($preset) {
    return response()->json(FeePreset::with('services')->findOrFail($preset)->services);
});
