<?php

namespace App\Livewire\Template;

use App\Livewire\Components\AlertSuccess;
use App\Services\TemplateService;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class UploadAssetTemplateModal extends Component
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
            'type' => ['required', Rule::in(['cover', 'img', 'css', 'js'])],
            'file' => 'required|extensions:css,js,jpg,jpeg,png'
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
        $this->file = '';
        $this->isOpen = false;
    }

    public function setOpen(string $type)
    {
        $this->isOpen = true;
        $this->type = $type;
    }

    public function save()
    {
        $this->validate();

        if ($this->type == 'cover' && !in_array(strtolower($this->file->getclientoriginalextension()), ['png', 'jpg', 'jpeg'])) {
            $this->addError('file', "Extension untuk cover harus jpg, jpeg, png.");

            return;
        }

        if ($this->type == 'css' && strtolower($this->file->getclientoriginalextension()) != 'css') {
            $this->addError('file', "Extension untuk cover harus css.");

            return;
        }

        $fileName = \Illuminate\Support\Str::random(10) . '.' . strtolower($this->file->getclientoriginalextension());

        $this->templateService->updateAssetTemplate($this->code, $this->type, $fileName);
        $this->file->storePubliclyAs($this->type, $fileName, 'public-custom');

        $this->file = '';
        $this->dispatch('do-close')->self();
        $this->dispatch('show-alert-upload-asset-success');
        $this->dispatch('do-refresh')->to(ListAssetCssSection::class);
    }

    public function render()
    {
        return view('livewire.template.upload-asset-template-modal');
    }
}
