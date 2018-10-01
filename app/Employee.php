<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'EmployeeId';
    protected $fillable = ['Name', 'Username', 'DOB', 'Number','UserId' ,'AdminId'];
}
