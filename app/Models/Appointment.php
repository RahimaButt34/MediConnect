<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // In columns ko allow karna lazmi hai
    protected $fillable = [
    'user_id', 
    'doctor_id', 
    'appointment_date', 
    'status', 
    'admin_message' // Yeh yahan hona lazmi hai
];

    // Patient (User) ke sath relationship
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Doctor ke sath relationship
    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
}