
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Details | Medicare</title>

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

        .details-container {
            background: white;
            max-width: 750px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .detail {
            padding: 16px 0;
            border-bottom: 1px solid #e5e9ed;
        }

        .detail:last-child {
            border-bottom: none;
        }

        .detail label {
            display: block;
            color: #17324d;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .detail p {
            color: #555;
            line-height: 1.6;
            white-space: pre-wrap;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .edit-btn {
            background: #187b72;
            color: white;
            text-decoration: none;
            padding: 12px 22px;
            border-radius: 6px;
            font-size: 14px;
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
        <h1>Consultation Details</h1>
    </div>

    <div class="details-container">

        <div class="detail">
            <label>Consultation ID</label>
            <p>{{ $consultation->id }}</p>
        </div>

        <div class="detail">
            <label>Patient Name</label>
            <p>{{ $consultation->patient->name ?? 'N/A' }}</p>
        </div>

        <div class="detail">
            <label>Doctor Name</label>
            <p>{{ $consultation->doctor->name ?? 'N/A' }}</p>
        </div>

        <div class="detail">
            <label>Consultation Date</label>
            <p>{{ $consultation->consultation_date }}</p>
        </div>

        <div class="detail">
            <label>Diagnosis</label>
            <p>{{ $consultation->diagnosis ?: 'Not specified' }}</p>
        </div>

        <div class="detail">
            <label>Treatment</label>
            <p>{{ $consultation->treatment ?: 'Not specified' }}</p>
        </div>

        <div class="buttons">
            <a href="{{ route('consultations.edit', $consultation->id) }}"
               class="edit-btn">
                Edit Consultation
            </a>

            <a href="{{ route('consultations.index') }}"
               class="back-btn">
                Back to Records
            </a>
        </div>

    </div>

</div>

</body>
</html>
