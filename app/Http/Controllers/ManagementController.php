<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        return view('management.index');
    }

    public function myInvitation()
    {
        return view('management.my-invitation');
    }
}
