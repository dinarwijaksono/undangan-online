<?php

namespace App\Livewire\Template;

use App\Livewire\Components\AlertSuccess;
use App\Services\TemplateService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class HtmlContentTemplateSection extends Component
{
    public $template;

    public $content;

    protected $templateService;

    public function mount()
    {
        $this->content = Storage::disk('public-custom')->get("html/" . $this->template->html_path);
    }

    public function boot()
    {
        $this->templateService = app()->make(TemplateService::class);
    }

    public function getRules()
    {
        return [
            'content' => 'required'
        ];
    }

    public function save()
    {
        $this->validate();

        $result = $this->templateService->updateContentHtml($this->template->html_path, $this->content);

        if ($result) {
            $this->dispatch('open-alert', 'Konten html berhasil diupdate.')->to(AlertSuccess::class);
        }
    }

    public function render()
    {
        return view('livewire.template.html-content-template-section');
    }
}
