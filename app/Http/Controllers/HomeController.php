<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class HomeController extends Controller
{
    public function getIndex(){
        $employees = Employee::all();
        return view('home' ,['employees' => $employees]);
    }
}
