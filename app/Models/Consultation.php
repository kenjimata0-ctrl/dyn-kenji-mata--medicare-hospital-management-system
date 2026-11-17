<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consultation extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'consultation_date',
        'diagnosis',
        'treatment',
    ];

    // Each consultation belongs to one patient
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    // Each consultation belongs to one doctor
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
