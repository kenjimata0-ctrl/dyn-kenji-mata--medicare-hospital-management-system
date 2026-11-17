
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient | Medicare</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f3f6f9;
            color: #263747;
        }

        .header {
            background: #17324d;
            color: white;
            padding: 20px 35px;
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        h2 {
            margin-top: 0;
            color: #17324d;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccd5dd;
            border-radius: 5px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button, .back {
            padding: 11px 18px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        button {
            background: #168b87;
            color: white;
        }

        .back {
            background: #e5e9ed;
            color: #263747;
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="header">Medicare | Patient Management</div>

<div class="container">
    <h2>Add New Patient</h2>
    <p>Enter the patient's information below.</p>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <label>Patient Name *</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Age</label>
        <input type="number" name="age" value="{{ old('age') }}" min="0" max="150">
        @error('age')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Gender</label>
        <select name="gender">
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        </select>

        <label>Contact Number</label>
        <input type="text" name="contact_number" value="{{ old('contact_number') }}">

        <label>Address</label>
        <textarea name="address" rows="3">{{ old('address') }}</textarea>

        <div class="buttons">
            <button type="submit">Save Patient</button>
            <a href="{{ route('patients.index') }}" class="back">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
