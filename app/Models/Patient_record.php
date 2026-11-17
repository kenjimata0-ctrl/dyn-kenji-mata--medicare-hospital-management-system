<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientRecord extends Model
{
    protected $fillable = [
        'patient_id',
        'blood_type',
        'allergies',
        'medical_history',
    ];

    // Each patient record belongs to one patient
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
