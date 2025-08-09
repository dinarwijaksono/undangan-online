<?php

namespace App\Livewire\Template;

use App\Services\TemplateService;
use Livewire\Component;

class ListAssetCoverSection extends Component
{
    public $code;
    public $covers;

    public function boot(TemplateService $templateService)
    {
        $template = $templateService->findByCode($this->code);
        $this->covers = json_decode($template->cover_path);
    }

    public function getListeners()
    {
        return [
            'do-refresh' => 'boot'
        ];
    }

    public function doShowModalUploadAsset()
    {
        $this->dispatch('do-open', type: 'cover')->to(UploadAssetTemplateModal::class);
    }

    public function render()
    {
        return view('livewire.template.list-asset-cover-section');
    }
}
