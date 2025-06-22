<?php

namespace App\Livewire\Template;

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

    public function openModalCreateAsset()
    {
        $this->dispatch('do-open')->to(CreateAssetTemplateModalForm::class);
    }

    public function render()
    {
        return view('livewire.template.list-asset-css-section');
    }
}
