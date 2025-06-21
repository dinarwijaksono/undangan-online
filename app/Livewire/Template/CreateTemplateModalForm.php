<?php

namespace App\Livewire\Template;

use App\Livewire\Components\AlertSuccess;
use App\Services\TemplateService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateTemplateModalForm extends Component
{
    use WithFileUploads;

    protected $templateService;

    public $isOpen = false;

    public $name;
    public $file;

    public function boot()
    {
        $this->templateService = app()->make(TemplateService::class);
    }

    public function getListeners()
    {
        return [
            'do-open' => 'setOpen',
            'do-close' => 'setClose'
        ];
    }

    public function getRules()
    {
        return [
            'name' => 'required',
            'file' => 'required|extensions:html|max:5120'
        ];
    }

    public function setOpen()
    {
        $this->isOpen = true;
    }

    public function setClose()
    {
        $this->isOpen = false;

        $this->name = '';
        $this->file = '';
    }

    public function save()
    {
        $this->validate();

        $fileName = Str::random(10) . '.html';

        $this->templateService->create(auth()->user(), $this->name, $fileName);

        $this->file->storePubliclyAs('html', $fileName, 'public-custom');

        $this->dispatch('to-close')->self();
        $this->dispatch('open-alert', "Template berhasil disimpan.")->to(AlertSuccess::class);
    }

    public function render()
    {
        return view('livewire.template.create-template-modal-form');
    }
}
