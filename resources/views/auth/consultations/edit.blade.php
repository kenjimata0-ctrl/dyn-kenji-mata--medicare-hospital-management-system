
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Consultation | Medicare</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f8;
            color: #333;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #17324d;
            position: fixed;
            padding: 25px 20px;
            color: white;
        }

        .sidebar h2 {
            margin-bottom: 35px;
            font-size: 24px;
        }

        .sidebar a {
            display: block;
            color: #dce5ec;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #187b72;
            color: white;
        }

        .main {
            margin-left: 240px;
            padding: 35px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            color: #17324d;
            font-size: 28px;
        }

        .form-container {
            background: white;
            max-width: 750px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #17324d;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccd3da;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #187b72;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .save-btn {
            background: #187b72;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .save-btn:hover {
            background: #12645d;
        }

        .back-btn {
            background: #e5e9ed;
            color: #17324d;
            text-decoration: none;
            padding: 12px 22px;
            border-radius: 6px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar h2 {
                margin-bottom: 15px;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2>Medicare</h2>

    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('patients.index') }}">Patients</a>
    <a href="{{ route('doctors.index') }}">Doctors</a>
    <a href="{{ route('appointments.index') }}">Appointments</a>
    <a href="{{ route('consultations.index') }}" class="active">Consultations</a>
</div>

<div class="main">

    <div class="header">
        <h1>Edit Consultation</h1>
    </div>

    <div class="form-container">

        <form action="{{ route('consultations.update', $consultation->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="patient_id">Select Patient</label>

                <select name="patient_id" id="patient_id" required>
                    <option value="">-- Select Patient --</option>

                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}"
                            {{ old('patient_id', $consultation->patient_id) == $patient->id ? 'selected' : '' }}>
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>

                @error('patient_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="doctor_id">Select Doctor</label>

                <select name="doctor_id" id="doctor_id" required>
                    <option value="">-- Select Doctor --</option>

                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}"
                            {{ old('doctor_id', $consultation->doctor_id) == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }} - {{ $doctor->specialization }}
                        </option>
                    @endforeach
                </select>

                @error('doctor_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="consultation_date">Consultation Date</label>

                <input type="date"
                       name="consultation_date"
                       id="consultation_date"
                       value="{{ old('consultation_date', $consultation->consultation_date) }}"
                       required>

                @error('consultation_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="diagnosis">Diagnosis</label>

                <textarea name="diagnosis"
                          id="diagnosis"
                          placeholder="Enter patient's diagnosis">{{ old('diagnosis', $consultation->diagnosis) }}</textarea>

                @error('diagnosis')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="treatment">Treatment</label>

                <textarea name="treatment"
                          id="treatment"
                          placeholder="Enter recommended treatment">{{ old('treatment', $consultation->treatment) }}</textarea>

                @error('treatment')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="buttons">
                <button type="submit" class="save-btn">
                    Update Consultation
                </button>

                <a href="{{ route('consultations.index') }}" class="back-btn">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

</body>
</html>
