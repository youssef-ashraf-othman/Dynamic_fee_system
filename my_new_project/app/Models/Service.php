<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'fee_preset_id', 'percentage'];

    public function feePreset()
    {
        return $this->belongsTo(FeePreset::class);
    }
}
