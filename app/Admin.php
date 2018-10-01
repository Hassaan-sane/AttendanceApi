<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey = 'AdminId';
    protected $fillable = ['Name', 'Username', 'DOB', 'Number', 'OrgCodeId','UserId', 'TotalEmployee'];
}
