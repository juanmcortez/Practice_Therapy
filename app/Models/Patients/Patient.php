<?php

namespace App\Models\Patients;

use App\Models\Demographics\Address;
use App\Models\Demographics\Phone;
use App\Models\Insurances\Insurance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Elements hidden from json request
     * @var array
     */
    protected $hidden = [
        'externalID', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Elements that are mass asignable.
     * @var array
     */
    protected $fillable = [
        'externalID', 'first_name', 'middle_name', 'last_name'
    ];

    /**
     * This relationship uses a pivot table
     *
     * @return void
     */
    public function insurances()
    {
        return $this->belongsToMany(Insurance::class);
    }

    /**
     * This relationship uses a pivot table
     *
     * @return void
     */
    public function address()
    {
        return $this->belongsToMany(Address::class);
    }

    /**
     * This relationship uses a pivot table
     *
     * @return void
     */
    public function phones()
    {
        return $this->belongsToMany(Phone::class);
    }
}
