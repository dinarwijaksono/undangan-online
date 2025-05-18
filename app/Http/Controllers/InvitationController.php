<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function myInvitation()
    {
        return view('/invitation/my-invitation');
    }

    public function selectATheme()
    {
        return view('/invitation/select-a-theme');
    }

    public function createInvitation()
    {
        return view('/invitation/create-invitation');
    }

    public function editInvitation()
    {
        return view('/invitation/edit-invitation');
    }
}
