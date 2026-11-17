<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'status',
        'reason',
    ];

    // Each appointment belongs to one patient
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    // Each appointment belongs to one doctor
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
