<!DOCTYPE html>
<html lang="en">
<head>
    <title>MediConnect | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark shadow shadow-sm p-3">
        <div class="container">
            <span class="navbar-brand mb-0 h1">MediConnect Admin</span>
            <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <h4>Welcome, Admin! 👋</h4>
                    <p>Yahan se aap Doctors ko manage kar sakte hain.</p>
                </div>
            </div>
            
            <div class="col-md-4 mt-3">
                <div class="card text-center p-4 shadow-sm">
                    <h3>Manage Doctors</h3>
                    <p>Add new doctors or remove existing ones.</p>
                    <!-- <a href="#" class="btn btn-primary disabled">Go to CRUD (Next Step)</a> 
                     -->
                    <a href="{{ route('admin.doctors') }}" class="btn btn-primary">Go to CRUD (Next Step)</a>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="card text-center p-4 shadow-sm border-warning">
                    <h3>View Appointments</h3>
                    <p>See all patient bookings here.</p>
                    <!-- <a href="#" class="btn btn-warning disabled text-white">View List</a> -->
                     <a href="{{ route('admin.appointments') }}" class="btn btn-warning">View List</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>