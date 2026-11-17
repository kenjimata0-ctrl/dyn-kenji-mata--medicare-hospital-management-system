<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Display all patients
    public function index()
    {
        $patients = Patient::latest()->paginate(10);

        return view('auth.patients.index', compact('patients'));
    }

    // Show add patient form
    public function create()
    {
        return view('auth.patients.create');
    }

    // Save new patient
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:150'],
            'gender' => ['required', 'string', 'max:50'],
            'contact_number' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Patient added successfully!');
    }

    // Display patient details
    public function show(Patient $patient)
    {
        return view('auth.patients.show', compact('patient'));
    }

    // Show edit patient form
    public function edit(Patient $patient)
    {
        return view('auth.patients.edit', compact('patient'));
    }

    // Update patient information
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:150'],
            'gender' => ['required', 'string', 'max:50'],
            'contact_number' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Patient updated successfully!');
    }

    // Delete patient
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient deleted successfully!');
    }
}
