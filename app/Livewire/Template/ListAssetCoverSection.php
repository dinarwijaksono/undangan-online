<?php

namespace App\Livewire\Template;

use Livewire\Component;

class ListAssetCoverSection extends Component
{

    public function doShowModalUploadAsset()
    {
        $this->dispatch('do-open', type: 'cover')->to(UploadAssetTemplateModal::class);
    }

    public function render()
    {
        return view('livewire.template.list-asset-cover-section');
    }
}
