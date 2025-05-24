<?php

namespace App\Livewire\InvitationTemplate;

use App\Http\Requests\CreateVariabelRequest;
use App\Services\ThemeVariabelService;
use Livewire\Component;

class CreateVariabelModal extends Component
{
    protected $themeVariabelService;

    public $isOpen = false;

    public $code;

    public $variabelName;
    public $variabelType;

    public function boot()
    {
        $this->themeVariabelService = app()->make(ThemeVariabelService::class);
    }

    public function getRules()
    {
        return (new CreateVariabelRequest())->rules();
    }

    public function getListeners()
    {
        return [
            'open-modal' => 'setOpen',
            'close-modal' => 'setClose',
        ];
    }

    public function setOpen()
    {
        $this->isOpen = true;
    }

    public function setClose()
    {
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate();

        $this->themeVariabelService->create($this->code, $this->variabelName, $this->variabelType);

        $this->variabelName = '';
        $this->variabelType = '';

        $this->dispatch('close-modal')->self();
        $this->dispatch('open-alert', "Variabel berhasil disimpan.")->to('components.alert-success');
    }

    public function render()
    {
        return view('livewire.invitation-template.create-variabel-modal');
    }
}
