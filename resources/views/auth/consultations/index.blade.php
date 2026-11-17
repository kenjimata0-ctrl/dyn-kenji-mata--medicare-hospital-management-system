
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultations | Medicare</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 15px;
        }

        .header h1 {
            color: #17324d;
            font-size: 28px;
        }

        .add-btn {
            background: #187b72;
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
        }

        .add-btn:hover {
            background: #12645d;
        }

        .table-container {
            background: white;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #e5e9ed;
            font-size: 14px;
        }

        th {
            background: #f4f6f8;
            color: #17324d;
        }

        .actions a {
            text-decoration: none;
            margin-right: 8px;
            font-weight: bold;
            font-size: 13px;
        }

        .view {
            color: #187b72;
        }

        .edit {
            color: #d18b25;
        }

        .delete {
            color: #c0392b;
            border: none;
            background: none;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
        }

        .success {
            background: #dff3e8;
            color: #216b45;
            padding: 13px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 25px;
        }

        .pagination {
            margin-top: 20px;
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

            .header {
                align-items: flex-start;
                flex-direction: column;
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
        <h1>Consultation Records</h1>

        <a href="{{ route('consultations.create') }}" class="add-btn">
            + Add New Consultation
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
                    <th>Diagnosis</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($consultations as $consultation)
                    <tr>
                        <td>{{ $consultation->id }}</td>

                        <td>
                            {{ $consultation->patient->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $consultation->doctor->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $consultation->consultation_date }}
                        </td>

                        <td>
                            {{ $consultation->diagnosis ?: 'Not specified' }}
                        </td>

                        <td class="actions">
                            <a class="view"
                               href="{{ route('consultations.show', $consultation->id) }}">
                                View
                            </a>

                            <a class="edit"
                               href="{{ route('consultations.edit', $consultation->id) }}">
                                Edit
                            </a>

                            <form action="{{ route('consultations.destroy', $consultation->id) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Are you sure you want to delete this consultation?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">
                            No consultation records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $consultations->links() }}
        </div>
    </div>

</div>

</body>
</html>
