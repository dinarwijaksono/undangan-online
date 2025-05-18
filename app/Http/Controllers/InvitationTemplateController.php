<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationTemplateController extends Controller
{
    public function listTemplate()
    {
        return view('invitation-template.list-template');
    }

    public function setVariabel()
    {
        return view('invitation-template.set-variabel');
    }
}
