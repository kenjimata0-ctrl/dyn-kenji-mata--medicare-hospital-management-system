<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with(['patient', 'doctor'])
            ->latest()
            ->paginate(10);

        return view('auth.consultations.index', compact('consultations'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        $doctors = Doctor::orderBy('name')->get();

        return view('auth.consultations.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => ['required', 'exists:patients,id'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'consultation_date' => ['required', 'date'],
            'diagnosis' => ['nullable', 'string'],
            'treatment' => ['nullable', 'string'],
        ]);

        Consultation::create($validated);

        return redirect()->route('consultations.index')
            ->with('success', 'Consultation added successfully!');
    }

    public function show(Consultation $consultation)
    {
        $consultation->load(['patient', 'doctor']);

        return view('auth.consultations.show', compact('consultation'));
    }

    public function edit(Consultation $consultation)
    {
        $patients = Patient::orderBy('name')->get();
        $doctors = Doctor::orderBy('name')->get();

        return view('auth.consultations.edit', compact(
            'consultation',
            'patients',
            'doctors'
        ));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'patient_id' => ['required', 'exists:patients,id'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'consultation_date' => ['required', 'date'],
            'diagnosis' => ['nullable', 'string'],
            'treatment' => ['nullable', 'string'],
        ]);

        $consultation->update($validated);

        return redirect()->route('consultations.index')
            ->with('success', 'Consultation updated successfully!');
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return redirect()->route('consultations.index')
            ->with('success', 'Consultation deleted successfully!');
    }
}
