<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threshold extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_value',
        'max_value',
        'fee_percentage',  // Add fee_percentage to fillable attributes
        'preset_id',
    ];

    // علاقات الموديل (Relationship)
    public function feePreset()
    {
        return $this->belongsTo(FeePreset::class, 'preset_id');
    }


    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
