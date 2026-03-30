<!DOCTYPE html>
<html>
<head>
    <title>Register | MediConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container card col-md-4 p-4 shadow">
        <h3 class="text-center mb-4">Register</h3>
        
        <form action="/register" method="POST">
            @csrf <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Min 5 characters" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            
            <p class="text-center mt-3 small">
                Already have an account? <a href="/login">Login here</a>
            </p>
        </form>
    </div>
</body>
</html>