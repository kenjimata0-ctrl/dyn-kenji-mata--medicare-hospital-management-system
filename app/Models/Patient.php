<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'age',
        'gender',
        'contact_number',
        'address',
    ];

    // One patient has one patient record
    public function patientRecord(): HasOne
    {
        return $this->hasOne(PatientRecord::class);
    }

    // One patient can have many appointments
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    // One patient can have many consultations
    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }
}
