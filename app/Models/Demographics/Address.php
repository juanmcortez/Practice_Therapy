<?php

namespace App\Models\Demographics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
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
        'id', 'main', 'extended', 'city',
        'state', 'zip', 'country', 'pivot'
    ];
}
