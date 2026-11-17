
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Medicare</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f8;
            display: flex;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            background-color: #17324d;
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
            background-color: #28516f;
        }

        .main {
            flex: 1;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #17324d;
            font-size: 25px;
        }

        .logout-btn {
            background-color: #b33a3a;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
        }

        .welcome {
            background: white;
            padding: 22px;
            border: 1px solid #e1e5e9;
            border-radius: 5px;
            margin-bottom: 25px;
        }

        .welcome h3 {
            color: #17324d;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #666;
        }

        .section-title {
            color: #17324d;
            margin-bottom: 15px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .card {
            background: white;
            padding: 22px;
            border: 1px solid #e1e5e9;
            border-radius: 5px;
        }

        .card h4 {
            color: #666;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .card p {
            color: #17324d;
            font-size: 28px;
            font-weight: bold;
        }

        @media (max-width: 700px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>MEDICARE</h2>

        <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
        <a href="{{ route('patients.index') }}">Patients</a>
        <a href="{{ route('doctors.index') }}">Doctors</a>
        <a href="{{ route('appointments.index') }}">Appointments</a>
        <a href="{{ route('consultations.index') }}">Consultations</a>
    </div>

    <div class="main">

        <div class="header">
            <h1>Dashboard</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="welcome">
            <h3>Welcome, {{ auth()->user()->name }}!</h3>
            <p>Welcome to the Medicare Hospital Management System.</p>
        </div>

        <h3 class="section-title">System Overview</h3>

        <div class="cards">

            <div class="card">
                <h4>Total Patients</h4>
                <p>{{ $patientCount }}</p>
            </div>

            <div class="card">
                <h4>Total Doctors</h4>
                <p>{{ $doctorCount }}</p>
            </div>

            <div class="card">
                <h4>Total Appointments</h4>
                <p>{{ $appointmentCount }}</p>
            </div>

            <div class="card">
                <h4>Total Consultations</h4>
                <p>{{ $consultationCount }}</p>
            </div>

        </div>

    </div>

</body>
</html>
