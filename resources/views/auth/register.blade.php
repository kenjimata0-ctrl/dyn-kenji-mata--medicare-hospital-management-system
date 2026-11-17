
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Medicare</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
        }

        .register-container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 45px 55px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #17324d;
            font-size: 36px;
            margin-bottom: 12px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            font-size: 17px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 17px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            font-size: 16px;
        }

        input:focus {
            border-color: #17324d;
        }

        .register-btn {
            width: 100%;
            padding: 17px;
            background: #17324d;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 8px;
        }

        .register-btn:hover {
            background: #244b6d;
        }

        .register-btn:disabled {
            opacity: .65;
            cursor: not-allowed;
        }

        .login-link {
            text-align: center;
            margin-top: 28px;
            font-size: 16px;
            color: #666;
        }

        a {
            color: #17324d;
            text-decoration: none;
            font-weight: bold;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-size: 15px;
        }

        .error {
            background: #ffe9e9;
            color: #b42318;
        }

        .error ul {
            padding-left: 20px;
        }

        @media (max-width: 550px) {
            .register-container {
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

<div class="register-container">

    <h2>MEDICARE</h2>
    <p class="subtitle">Create your account</p>

    @if($errors->any())
        <div class="alert error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}" id="registerForm">
        @csrf

        <div class="form-group">
            <label for="name">Full Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your full name"
                required
                maxlength="255"
                autocomplete="name"
            >
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                required
                autocomplete="email"
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="At least 8 characters"
                required
                minlength="8"
                autocomplete="new-password"
            >
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm your password"
                required
                minlength="8"
                autocomplete="new-password"
            >
        </div>

        <button type="submit" class="register-btn" id="registerButton">
            Sign Up
        </button>

        <div class="login-link">
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </form>

</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function () {
        const button = document.getElementById('registerButton');
        button.disabled = true;
        button.textContent = 'Creating Account...';
    });
</script>

</body>
</html>
