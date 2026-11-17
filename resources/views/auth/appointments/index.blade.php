
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments | Medicare</title>

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
            padding: 22px;
            border: 1px solid #e1e5e9;
            border-radius: 5px;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .content-header h2 {
            color: #17324d;
            font-size: 20px;
        }

        .add-btn {
            background: #187b72;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 14px;
        }

        .add-btn:hover {
            background: #12645d;
        }

        .success {
            background: #e5f5ed;
            color: #216b45;
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 4px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 13px 12px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        th {
            background: #f1f4f6;
            color: #17324d;
        }

        td {
            color: #444;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 4px;
            background: #e8f1f8;
            color: #245b91;
            font-size: 12px;
        }

        .action a {
            text-decoration: none;
            margin-right: 8px;
            font-size: 13px;
        }

        .view {
            color: #187b72;
        }

        .edit {
            color: #245b91;
        }

        .delete {
            color: #b33a3a;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #777;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination svg {
            width: 14px !important;
            height: 14px !important;
        }

        .pagination a,
        .pagination span {
            font-size: 13px !important;
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

            .content-header {
                gap: 12px;
                align-items: flex-start;
                flex-direction: column;
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
            <h1>Appointments</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <section class="content">

            <div class="content-header">
                <h2>Appointment Records</h2>

                <a href="{{ route('appointments.create') }}" class="add-btn">
                    + Add New Appointment
                </a>
            </div>

            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
                                <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</td>
                                <td>
                                    <span class="status">
                                        {{ $appointment->status }}
                                    </span>
                                </td>

                                <td class="action">
                                    <a href="{{ route('appointments.show', $appointment->id) }}" class="view">View</a>

                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="edit">Edit</a>

                                    <form action="{{ route('appointments.destroy', $appointment->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty">
                                    No appointment records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $appointments->links() }}
            </div>

        </section>

    </main>

</body>
</html>
