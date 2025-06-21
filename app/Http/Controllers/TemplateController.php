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

    public function setVariabel(string $code)
    {
        $data['code'] = $code;

        return view('template.set-variabel', $data);
    }
}
