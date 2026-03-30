<!DOCTYPE html>
<html>
<head>
    <title>My Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h3>My Appointment History</h3>
            <a href="/patient/dashboard" class="btn btn-secondary">Back</a>
        </div>

        <table class="table table-bordered bg-white shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Status</th>
                     <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $app)
                <tr>
                    <td>Dr. {{ $app->doctor->name }}</td>
                    <td>{{ $app->appointment_date }}</td>
                    <td>
                        @if($app->status == 'approved')
                            <span class="badge bg-success">Approved ✅</span>
                        @elseif($app->status == 'rejected')
                            <span class="badge bg-danger">Rejected ❌</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending ⏳</span>
                        @endif
                    </td>

                    <td>
    <strong>{{ strtoupper($app->status) }}</strong>
    @if($app->admin_message)
        <div class="mt-1 p-1 bg-light border small text-primary">
            <b>Note:</b> {{ $app->admin_message }}
        </div>
    @endif
</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No appointments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>