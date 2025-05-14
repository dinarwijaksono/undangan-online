<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function myInvitation()
    {
        return view('/invitation/my-invitation');
    }

    public function createInvitation()
    {
        return view('/invitation/create-invitation');
    }
}
