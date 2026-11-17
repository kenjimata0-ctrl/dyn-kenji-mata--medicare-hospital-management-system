<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Display all doctors
    public function index()
    {
        $doctors = Doctor::latest()->paginate(10);

        return view('auth.doctors.index', compact('doctors'));
    }

    // Show add doctor form
    public function create()
    {
        return view('auth.doctors.create');
    }

    // Save new doctor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'specialization' => ['nullable', 'string', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        Doctor::create($validated);

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor added successfully!');
    }

    // Display doctor details
    public function show(Doctor $doctor)
    {
        return view('auth.doctors.show', compact('doctor'));
    }

    // Show edit doctor form
    public function edit(Doctor $doctor)
    {
        return view('auth.doctors.edit', compact('doctor'));
    }

    // Update doctor information
    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'specialization' => ['nullable', 'string', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        $doctor->update($validated);

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor updated successfully!');
    }

    // Delete doctor
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor deleted successfully!');
    }
}
