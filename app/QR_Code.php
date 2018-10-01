<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QR_Code extends Model
{
    protected $primaryKey = 'QR_CodeId';
    protected $fillable = ['CodeString'];
}
