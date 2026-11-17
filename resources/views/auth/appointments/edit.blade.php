
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment | Medicare</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f8;
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 230px;
            min-height: 100vh;
            background: #17324d;
            color: white;
            padding: 25px 10px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 4px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #28516f;
        }

        .main {
            flex: 1;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #17324d;
            font-size: 25px;
        }

        .logout-btn {
            background: #b33a3a;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
        }

        .content {
            background: white;
            padding: 25px;
            border: 1px solid #e1e5e9;
            border-radius: 5px;
            max-width: 800px;
        }

        .content h2 {
            color: #17324d;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #34495e;
            font-weight: bold;
            font-size: 14px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccd3da;
            border-radius: 4px;
            font-size: 14px;
            background: white;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 90px;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #245b91;
        }

        .error {
            color: #b33a3a;
            font-size: 13px;
            margin-top: 5px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .save-btn,
        .cancel-btn {
            border: none;
            padding: 11px 18px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .save-btn {
            background: #245b91;
            color: white;
        }

        .cancel-btn {
            background: #e5e9ed;
            color: #263747;
        }

        @media (max-width: 700px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .main {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <h2>MEDICARE</h2>

        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('patients.index') }}">Patients</a>
        <a href="{{ route('doctors.index') }}">Doctors</a>
        <a href="{{ route('appointments.index') }}" class="active">Appointments</a>
        <a href="{{ route('consultations.index') }}">Consultations</a>
    </aside>

    <main class="main">

        <div class="header">
            <h1>Edit Appointment</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <section class="content">

            <h2>Update Appointment Information</h2>

            @if ($errors->any())
                <div class="error" style="margin-bottom: 15px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Select Patient *</label>

                    <select name="patient_id" required>
                        <option value="">-- Choose Patient --</option>

                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ old('patient_id', $appointment->patient_id) == $patient->id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Select Doctor *</label>

                    <select name="doctor_id" required>
                        <option value="">-- Choose Doctor --</option>

                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}"
                                {{ old('doctor_id', $appointment->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }} - {{ $doctor->specialization }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Appointment Date *</label>
                    <input type="date" name="appointment_date"
                        value="{{ old('appointment_date', $appointment->appointment_date) }}" required>
                </div>

                <div class="form-group">
                    <label>Appointment Time *</label>
                    <input type="time" name="appointment_time"
                        value="{{ old('appointment_time', $appointment->appointment_time) }}" required>
                </div>

                <div class="form-group">
                    <label>Status *</label>

                    <select name="status" required>
                        <option value="Scheduled"
                            {{ old('status', $appointment->status) == 'Scheduled' ? 'selected' : '' }}>
                            Scheduled
                        </option>

                        <option value="Completed"
                            {{ old('status', $appointment->status) == 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                        <option value="Cancelled"
                            {{ old('status', $appointment->status) == 'Cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Reason for Appointment</label>
                    <textarea name="reason"
                        placeholder="Enter reason for appointment">{{ old('reason', $appointment->reason) }}</textarea>
                </div>

                <div class="buttons">
                    <button type="submit" class="save-btn">
                        Update Appointment
                    </button>

                    <a href="{{ route('appointments.index') }}" class="cancel-btn">
                        Cancel
                    </a>
                </div>

            </form>

        </section>

    </main>

</body>
</html>
