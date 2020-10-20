<?php

namespace App\Models\Patients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class InsurancePatient extends Pivot
{
    use HasFactory;
}
