<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MediConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container card col-md-4 p-4 shadow">
        <h3 class="text-center mb-4">Login</h3>

        @if(session('error'))
            <div class="alert alert-danger p-2 small text-center">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success p-2 small text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="admin@gmail.com ya patient email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
            
            <p class="text-center small">
                Don't have an account? <a href="/register">Register here</a>
            </p>
        </form>
    </div>
</body>
</html>