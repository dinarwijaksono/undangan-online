<?php

namespace App\Http\Controllers;

use App\Services\TemplateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    protected $templateService;

    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }

    public function listTemplate()
    {
        return view('template.list-template');
    }

    public function detailTemplate(string $code)
    {
        $template = $this->templateService->findByCode($code);

        if (is_null($template)) {
            Log::warning('redirect page from template/detail-template to template', [
                'user_id' => auth()->user()->id,
                'template_code' => $code
            ]);

            return redirect('/template');
        }

        $data['template'] = $template;
        $data['code'] = $code;

        return view('template.detail-template', $data);
    }

    public function setCover(string $code)
    {
        $data['code'] = $code;

        return view('template.set-cover', $data);
    }

    public function setVariabel(string $code)
    {
        $data['code'] = $code;

        return view('template.set-variabel', $data);
    }

    public function preview(string $code)
    {
        $template = $this->templateService->findByCode($code);

        $html = Storage::disk('public-custom')->get("html/$template->html_path");

        return $html;
    }
}
