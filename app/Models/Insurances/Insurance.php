<?php

namespace App\Models\Insurances;

use App\Models\Demographics\Address;
use App\Models\Demographics\Phone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
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
        'id', 'attention', 'group', 'name', 'default_effective',
        'default_termination', 'participating', 'do_not_bill', 'do_not_import', 'cms_id',
        'payer_type', 'x12_partner', 'financial_class', 'payment_code', 'pivot'
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
