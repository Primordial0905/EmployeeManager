<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'Name',
        'Age',
        'Address',
        'Phone',
        'Image'
    ];
}
