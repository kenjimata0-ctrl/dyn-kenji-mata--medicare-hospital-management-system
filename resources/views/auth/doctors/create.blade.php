
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor | Medicare</title>

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

        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccd5dd;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #187b72;
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
        <a href="{{ route('patients.index') }}">Patients</a>
        <a href="{{ route('doctors.index') }}" class="active">Doctors</a>
        <a href="{{ route('appointments.index') }}">Appointments</a>
        <a href="{{ route('consultations.index') }}">Consultations</a>
    </aside>

    <main class="main">

        <div class="header">
            <h1>Add Doctor</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <section class="content">

            <h2>Doctor Information</h2>
            <p>Enter the doctor's information below.</p>

            <form action="{{ route('doctors.store') }}" method="POST">
                @csrf

                <label>Doctor Name *</label>
                <input type="text" name="name"
                       value="{{ old('name') }}" required>

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label>Specialization</label>
                <input type="text" name="specialization"
                       value="{{ old('specialization') }}">

                @error('specialization')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label>Contact Number</label>
                <input type="text" name="contact_number"
                       value="{{ old('contact_number') }}">

                @error('contact_number')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label>Email Address</label>
                <input type="email" name="email"
                       value="{{ old('email') }}">

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <div class="buttons">
                    <button type="submit" class="save-btn">
                        Save Doctor
                    </button>

                    <a href="{{ route('doctors.index') }}" class="back-btn">
                        Cancel
                    </a>
                </div>

            </form>

        </section>

    </main>

</body>
</html>
