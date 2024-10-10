<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeePreset extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    
    public function thresholds()
    {
        return $this->hasMany(Threshold::class, 'preset_id');
    }
    
}
