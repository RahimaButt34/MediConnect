<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class DoctorController extends Controller
{
    // ================= ADMIN SIDE: DOCTORS CRUD =================

    // 1. VIEW ALL DOCTORS
    public function index() {
        $doctors = Doctor::all();
        return view('admin_doctors', compact('doctors'));
    }

    // 2. STORE (ADD NEW)
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'specialty' => 'required',
            'phone' => 'required'
        ]);

        Doctor::create($request->all());
        return back()->with('success', 'Doctor Added Successfully!');
    }

    // 3. EDIT (Show Edit Form)
    public function edit($id) {
        $doctor = Doctor::find($id);
        return view('admin_edit_doctor', compact('doctor'));
    }

    // 4. UPDATE (Save Changes)
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'specialty' => 'required',
            'phone' => 'required'
        ]);

        $doctor = Doctor::find($id);
        $doctor->update($request->all());

        return redirect()->route('admin.doctors')->with('success', 'Doctor Updated Successfully!');
    }

    // 5. DELETE
    public function destroy($id) {
        Doctor::find($id)->delete();
        return back()->with('success', 'Doctor Deleted!');
    }

    // ================= ADMIN SIDE: APPOINTMENT MANAGEMENT =================

    // 6. Appointments ki list dikhana
    public function manageAppointments() {
        $appointments = Appointment::with(['user', 'doctor'])->get();
        return view('admin_appointments', compact('appointments'));
    }

    // 7. Status aur Message update karna (Approve/Reject/Reschedule)
    public function updateStatus(Request $request, $id) {
        $appointment = Appointment::find($id);
        
        if($appointment) {
            $appointment->status = $request->status; 
            $appointment->admin_message = $request->admin_message; 
            $appointment->save();
            
            return back()->with('success', 'Appointment updated successfully!');
        }
        
        return back()->with('error', 'Appointment not found!');
    }

    // ================= PATIENT SIDE: BOOKING & HISTORY =================

    // 8. SHOW BOOKING FORM (Ye missing tha)
    public function showAppointmentForm() {
        $doctors = Doctor::all();
        return view('patient_book', compact('doctors'));
    }

    // 9. STORE APPOINTMENT (Ye missing tha)
    public function storeAppointment(Request $request) {
        $request->validate([
            'doctor_id' => 'required',
            'appointment_date' => 'required'
        ]);

        Appointment::create([
            'user_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'status' => 'pending'
        ]);

        return redirect()->route('patient.dashboard')->with('success', 'Appointment booked! Wait for approval.');
    }

    // 10. PATIENT HISTORY (Ye missing tha)
    public function patientHistory() {
        $appointments = Appointment::with('doctor')
                        ->where('user_id', auth()->id())
                        ->get();
        return view('patient_history', compact('appointments'));
    }
}