<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function listTemplate()
    {
        return view('template.list-template');
    }

    public function detailTemplate(string $code)
    {
        return view('template.detail-template');
    }
}
