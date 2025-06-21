<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function myInvitation()
    {
        return view('invitation.my-invitation');
    }

    public function selectTemplate()
    {
        return view('invitation.select-template');
    }

    public function createInvitation(string $code)
    {
        $data['code'] = $code;

        return view('invitation.create-invitation', $data);
    }

    public function editInvitation()
    {
        return view('/invitation/edit-invitation');
    }
}
