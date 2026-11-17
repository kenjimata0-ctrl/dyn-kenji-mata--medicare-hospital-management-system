
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient | Medicare</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f8;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 230px;
            min-height: 100vh;
            background: #17324d;
            color: white;
            padding: 25px 15px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 40px;
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
            min-width: 0;
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
            max-width: 750px;
        }

        .content h2 {
            color: #17324d;
            margin-bottom: 10px;
        }

        .content p {
            color: #777;
            font-size: 14px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 17px 0 7px;
            color: #263747;
            font-size: 14px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccd5dd;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #187b72;
        }

        textarea {
            resize: vertical;
        }

        .error {
            color: #b33a3a;
            font-size: 13px;
            margin-top: 5px;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        .save-btn {
            background: #187b72;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .save-btn:hover {
            background: #12645d;
        }

        .back-btn {
            background: #e5e9ed;
            color: #263747;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 4px;
            font-size: 14px;
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
        <a href="{{ route('patients.index') }}" class="active">Patients</a>
        <a href="{{ route('doctors.index') }}">Doctors</a>
        <a href="{{ route('appointments.index') }}">Appointments</a>
        <a href="{{ route('consultations.index') }}">Consultations</a>
    </aside>

    <main class="main">

        <div class="header">
            <h1>Edit Patient</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <section class="content">

            <h2>Update Patient Information</h2>
            <p>Modify the patient's information below.</p>

            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Patient Name *</label>
                <input type="text" name="name"
                       value="{{ old('name', $patient->name) }}" required>

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label>Age</label>
                <input type="number" name="age"
                       value="{{ old('age', $patient->age) }}"
                       min="0" max="150">

                @error('age')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label>Gender</label>
                <select name="gender">
                    <option value="">Select Gender</option>

                    <option value="Male"
                        {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>
                </select>

                <label>Contact Number</label>
                <input type="text" name="contact_number"
                       value="{{ old('contact_number', $patient->contact_number) }}">

                <label>Address</label>
                <textarea name="address" rows="3">{{ old('address', $patient->address) }}</textarea>

                <div class="buttons">
                    <button type="submit" class="save-btn">
                        Update Patient
                    </button>

                    <a href="{{ route('patients.index') }}" class="back-btn">
                        Cancel
                    </a>
                </div>

            </form>

        </section>

    </main>

</body>
</html>
