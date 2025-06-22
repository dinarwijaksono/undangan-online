<?php

namespace App\Livewire\Template;

use App\Livewire\Components\AlertSuccess;
use App\Services\TemplateService;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class CreateAssetTemplateModalForm extends Component
{
    use WithFileUploads;

    public $code;
    public $isOpen = false;

    public $type;
    public $file;

    protected $templateService;

    public function boot()
    {
        $this->templateService = app()->make(TemplateService::class);
    }

    public function getRules()
    {
        return [
            'type' => ['required', Rule::in(['css', 'js'])],
            'file' => 'required|extensions:css,js'
        ];
    }

    public function getListeners()
    {
        return [
            'do-open' => 'setOpen',
            'do-close' => 'setClose'
        ];
    }

    public function setClose()
    {
        $this->type = '';
        $this->file = '';
        $this->isOpen = false;
    }

    public function setOpen()
    {
        $this->isOpen = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->type != $this->file->getclientoriginalextension()) {
            $this->addError('file', 'Extension file tidak sesuai dengan type yang dipilih.');

            return;
        }

        $fileName = \Illuminate\Support\Str::random(10) . '.' . $this->type;

        $this->templateService->updateAssetTemplate($this->code, $this->type, $fileName);
        $this->file->storePubliclyAs($this->type, $fileName, 'public-custom');

        $this->file = '';
        $this->dispatch('do-close')->self();
        $this->dispatch('open-alert', "Asset berhasil ditambahkan.")->to(AlertSuccess::class);
    }

    public function render()
    {
        return view('livewire.template.create-asset-template-modal-form');
    }
}
