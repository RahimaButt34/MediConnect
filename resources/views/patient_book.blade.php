<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container card col-md-6 p-4 shadow">
        <h3>Book New Appointment</h3>
        <hr>
        <form action="/patient/store-appointment" method="POST">
            @csrf
            <div class="mb-3">
                <label>Select Doctor</label>
                <select name="doctor_id" class="form-control" required>
                    <option value="">-- Choose Doctor --</option>
                    @foreach($doctors as $dr)
                        <option value="{{ $dr->id }}">Dr. {{ $dr->name }} ({{ $dr->specialty }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Appointment Date</label>
                <input type="date" name="appointment_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Confirm Booking</button>
            <a href="/patient/dashboard" class="btn btn-link w-100 mt-2">Back</a>
        </form>
    </div>
</body>
</html>