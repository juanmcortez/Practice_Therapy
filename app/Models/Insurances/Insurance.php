<?php

namespace App\Models\Insurances;

use App\Models\Demographics\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
{
    use HasFactory, SoftDeletes;

    // This relationship uses a pivot table
    public function addresses()
    {
        return $this->belongsToMany(Address::class);
    }
}
