<!DOCTYPE html>
<html>
<head>
    <title>Edit Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container card col-md-4 p-4 shadow">
        <h4 class="text-center">Edit Doctor Details</h4>
        <hr>
        <form action="/admin/doctors/update/{{ $doctor->id }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Doctor Name</label>
                <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Specialty</label>
                <input type="text" name="specialty" value="{{ $doctor->specialty }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phone Number</label>
                <input type="text" name="phone" value="{{ $doctor->phone }}" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-success w-100">Update Doctor</button>
            <a href="/admin/doctors" class="btn btn-link w-100 mt-2">Cancel</a>
        </form>
    </div>
</body>
</html>