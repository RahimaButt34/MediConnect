<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Doctor Management (CRUD)</h2>
        <a href="/admin/dashboard" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm p-4">
                <h4 class="mb-3">Add New Doctor</h4>
                <form action="/admin/doctors/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Doctor Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Dr. Ali Ahmed" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Specialty</label>
                        <input type="text" name="specialty" class="form-control" placeholder="Cardiologist" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="03XXXXXXXXX" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Doctor</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm p-3">
                <h4 class="mb-3">Doctor List</h4>
                <table class="table table-hover bg-white shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($doctors as $dr)
                        <tr>
                            <td>{{ $dr->name }}</td>
                            <td>{{ $dr->specialty }}</td>
                            <td>{{ $dr->phone }}</td>
                            <td>
                                <a href="/admin/doctors/edit/{{ $dr->id }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <a href="/admin/doctors/delete/{{ $dr->id }}" 
                                   onclick="return confirm('Are you sure you want to delete this doctor?')" 
                                   class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No doctors found. Please add some!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>