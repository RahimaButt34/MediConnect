<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Appointments | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container card shadow p-4">
    <div class="d-flex justify-content-between mb-4">
        <h3>Patient Appointment Requests</h3>
        <a href="/admin/dashboard" class="btn btn-secondary btn-sm">Back to Dashboard</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Requested Date</th>
                <th>Current Status</th>
                <th>Action & Reschedule Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $app)
            <tr>
                <td>{{ $app->user->name }}</td>
                <td>Dr. {{ $app->doctor->name }}</td>
                <td>{{ $app->appointment_date }}</td>
                <td>
                    <span class="badge 
                        {{ $app->status == 'approved' ? 'bg-success' : 
                          ($app->status == 'rejected' ? 'bg-danger' : 'bg-warning text-dark') }}">
                        {{ strtoupper($app->status) }}
                    </span>
                </td>
                <td>
                    <form action="/admin/appointments/update/{{ $app->id }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <textarea name="admin_message" class="form-control form-control-sm" rows="2" 
                                      placeholder="Write day/time for reschedule or reason...">{{ $app->admin_message }}</textarea>
                        </div>
                        <div class="btn-group w-100">
                            <button name="status" value="approved" class="btn btn-sm btn-success">Approve</button>
                            <button name="status" value="rejected" class="btn btn-sm btn-danger">Reject</button>
                            <button name="status" value="rescheduled" class="btn btn-sm btn-warning">Reschedule</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>