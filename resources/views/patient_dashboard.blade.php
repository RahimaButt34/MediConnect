<!DOCTYPE html>
<html lang="en">
<head>
    <title>MediConnect | Patient Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-primary bg-primary shadow shadow-sm p-3 text-white">
        <div class="container">
            <span class="navbar-brand mb-0 h1 text-white">MediConnect Patient</span>
            <a href="{{ route('logout') }}" class="btn btn-light btn-sm text-primary">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-5 shadow-sm border-0 rounded-4">
                    <h2 class="text-primary">Welcome, {{ auth()->user()->name }}! ✨</h2>
                    <hr>
                    <p class="lead">Aapka account patient panel mein login ho chuka hai. Aap ab doctors ke saath appointments book kar sakte hain.</p>
                    
                    <div class="mt-4">
                        <!-- <button class="btn btn-success p-3 px-5 shadow-sm">Book New Appointment</button> -->
                         <a href="{{ route('patient.book') }}" class="btn btn-success">Book New Appointment</a>
                        <!-- <button class="btn btn-outline-secondary p-3 shadow-sm ms-2">My History</button> -->
                         <a href="{{ route('patient.history') }}" class="btn btn-outline-primary">My History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>