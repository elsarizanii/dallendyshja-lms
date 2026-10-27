<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <main class="container" style="max-width: 600px; margin-top: 50px;">
        <h2>Create an Account</h2>

        <form method="POST" action="/register">
            @csrf

            <div>
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus>
                @error('first_name')
                    <p class="error"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div>
                <label for="middle_name">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
                @error('middle_name')
                    <p class="error"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div>
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                @error('last_name')
                    <p class="error"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="error"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <p class="error"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button class="submit-button" type="submit">Register</button>
        </form>
    </main>
</body>
</html>