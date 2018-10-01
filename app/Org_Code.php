<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org_Code extends Model
{
    protected $primaryKey = 'CodeId';
    protected $fillable = ['Org_code', 'Org_name', 'Address', 'Country'];
}
