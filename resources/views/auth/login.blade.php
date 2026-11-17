
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Medicare</title>

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

        .login-container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 55px;
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
            margin-bottom: 38px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 17px;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 17px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 25px;
            outline: none;
            font-size: 17px;
        }

        input:focus {
            border-color: #17324d;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            margin-bottom: 28px;
        }

        .remember input {
            width: 19px;
            height: 19px;
        }

        .login-btn {
            width: 100%;
            padding: 17px;
            background: #17324d;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
        }

        .login-btn:hover {
            background: #244b6d;
        }

        .login-btn:disabled {
            opacity: .65;
            cursor: not-allowed;
        }

        .register-link {
            text-align: center;
            margin-top: 30px;
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

        .success {
            background: #e4f8ef;
            color: #167447;
        }

        .error {
            background: #ffe9e9;
            color: #b42318;
        }

        @media (max-width: 550px) {
            .login-container {
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <h2>MEDICARE</h2>
    <p class="subtitle">Hospital Management System</p>

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}" id="loginForm">
        @csrf

        <label for="email">Email Address</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter email"
            required
            autocomplete="username"
        >

        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter password"
            required
            autocomplete="current-password"
        >

        <label class="remember">
            <input type="checkbox" name="remember" value="1">
            Remember me
        </label>

        <button type="submit" class="login-btn" id="loginButton">
            Login
        </button>

        <div class="register-link">
            Don't have an account?
            <a href="{{ route('register') }}">Sign Up</a>
        </div>
    </form>

</div>

<script>
    document.getElementById('loginForm').addEventListener('submit', function () {
        const button = document.getElementById('loginButton');
        button.disabled = true;
        button.textContent = 'Logging in...';
    });
</script>

</body>
</html>
