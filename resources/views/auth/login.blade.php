<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; }
        .login-box { width: 300px; margin: 100px auto; background: white; padding: 20px; border-radius: 8px; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { width: 100%; padding: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>

        @if($errors->any())
            <div style="color: red;">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
