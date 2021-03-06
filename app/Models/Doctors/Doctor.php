<?php

namespace App\Models\Doctors;

use App\Models\Demographics\Address;
use App\Models\Demographics\Phone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Elements hidden from json request
     * @var array
     */
    protected $hidden = [
        'id', 'pivot', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Elements that are mass asignable.
     * @var array
     */
    protected $fillable = [
        'id', 'first_name', 'middle_name', 'last_name', 'specialty',
        'pivot'
    ];

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
