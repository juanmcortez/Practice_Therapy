<?php

namespace App\Models\Patients;

use App\Models\Insurances\Insurance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    // This relationship uses a pivot table
    public function insurances()
    {
        return $this->belongsToMany(Insurance::class);
    }
}
