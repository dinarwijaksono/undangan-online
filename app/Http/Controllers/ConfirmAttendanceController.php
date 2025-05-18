<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmAttendanceController extends Controller
{
    public function index()
    {
        return view('confirm-attendance.index');
    }
}
