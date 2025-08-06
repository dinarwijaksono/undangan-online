<?php

namespace App\Livewire\Template;

use App\Services\TemplateService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ListAssetCssSection extends Component
{
    public $template;

    public $asset;

    public $script;

    public function boot()
    {
        $this->asset = json_decode($this->template->css_path);

        $this->script = '';
        for ($i = 0; $i < count($this->asset); $i++) {
            $a = $this->asset[$i];
            $this->script .= "<link href='/storage-custom/css/$a' rel='stylesheet' />" . PHP_EOL;
        }
    }

    public function getListeners()
    {
        return [
            'do-refresh' => 'boot'
        ];
    }

    public function openModalCreateAsset()
    {
        $this->dispatch('do-open')->to(UploadAssetTemplateModal::class);
    }

    public function doDeleteCss(string $fileName)
    {
        $templateService = app()->make(TemplateService::class);

        Storage::disk('public-custom')->delete("css/$fileName");

        $templateService->deleteAssetTemplate($this->template->code, 'css', $fileName);

        $this->dispatch('show-delete-asset-success');
    }

    public function render()
    {
        return view('livewire.template.list-asset-css-section');
    }
}
