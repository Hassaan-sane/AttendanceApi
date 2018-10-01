<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $primaryKey = 'AttendanceId';
    protected $fillable = ['CheckIn', 'CheckOut', 'TotalDuration', 'EmployeeId'];
}
