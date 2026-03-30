<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // Ye line lazmi honi chahiye
    protected $fillable = ['name', 'specialty', 'phone'];
}