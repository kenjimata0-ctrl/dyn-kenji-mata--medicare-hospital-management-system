
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details | Medicare</title>

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

        .detail {
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail label {
            display: block;
            color: #777;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .detail p {
            color: #263747;
            font-size: 15px;
            font-weight: bold;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        .buttons a {
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 4px;
            font-size: 14px;
        }

        .edit-btn {
            background: #245b91;
            color: white;
        }

        .back-btn {
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
        <a href="{{ route('doctors.index') }}" class="active">Doctors</a>
        <a href="{{ route('appointments.index') }}">Appointments</a>
        <a href="{{ route('consultations.index') }}">Consultations</a>
    </aside>

    <main class="main">

        <div class="header">
            <h1>Doctor Details</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <section class="content">

            <h2>Doctor Information</h2>

            <div class="detail">
                <label>Doctor ID</label>
                <p>{{ $doctor->id }}</p>
            </div>

            <div class="detail">
                <label>Doctor Name</label>
                <p>{{ $doctor->name }}</p>
            </div>

            <div class="detail">
                <label>Specialization</label>
                <p>{{ $doctor->specialization ?? 'N/A' }}</p>
            </div>

            <div class="detail">
                <label>Contact Number</label>
                <p>{{ $doctor->contact_number ?? 'N/A' }}</p>
            </div>

            <div class="detail">
                <label>Email Address</label>
                <p>{{ $doctor->email ?? 'N/A' }}</p>
            </div>

            <div class="buttons">
                <a href="{{ route('doctors.edit', $doctor->id) }}" class="edit-btn">
                    Edit Doctor
                </a>

                <a href="{{ route('doctors.index') }}" class="back-btn">
                    Back to Doctors
                </a>
            </div>

        </section>

    </main>

</body>
</html>
