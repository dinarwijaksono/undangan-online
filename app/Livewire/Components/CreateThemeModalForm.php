<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CreateThemeModalForm extends Component
{
    public $isOpen = false;

    public $name;
    public $filename;

    public $file;

    protected $themeService;

    public function boot()
    {
        $this->themeService = app()->make(\App\Services\ThemeService::class);

        self::getTemplates();
    }

    public function getRules()
    {
        return [
            'name' => 'required|max:100',
            'filename' => 'required',
        ];
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

    public function getTemplates()
    {
        $t = glob("templates/*");

        $tem = [];

        for ($i = 0; $i < count($t); $i++) {
            $tem[] = trim(str_replace(["templates/"], [""], $t[$i]));
        }

        $this->file = $tem;
    }

    public function save()
    {
        $this->validate();

        $this->themeService->createTheme($this->name, $this->filename);

        $this->name = "";
        $this->filename = "";

        $this->dispatch('close-modal')->self();
        $this->dispatch('refresh')->to('invitation-template.list-template');
    }

    public function render()
    {
        return view('livewire.components.create-theme-modal-form');
    }
}
