<?php

namespace App\Livewire;

use App\Models\Text;
use Livewire\Component;

class Texts extends Component
{
    public $element;

    public $textname;
    public $description;

    public $confirmingAddition = false;
    public $confirmingDetail = false;

    protected $rules = [
        'textname' => 'required|string|min:1',
        'description' => 'required|string|min:1',
    ];

    public function render()
    {
        $elements = Text::get();
        return view('livewire.texts', [
            'elements' => $elements
        ]);
    }

    public function refreshElements()
    {
        $this->mount();
        $this->render();
        session()->flash('message', 'El elemento se ha agregado exitosamente');
    }

    public function confirmAddition()
    {
        $this->reset(['element', 'textname', 'description']);
        $this->confirmingAddition = true;
    }

    public function confirmEdition(Text $element)
    {
        $this->element = $element;
        $this->textname = $element->textname;
        $this->description = $element->description;
        $this->confirmingAddition = true;
    }

    public function confirmDetail(Text $element)
    {
        $this->element = $element;
        $this->textname = $element->textname;
        $this->description = $element->description;
        $this->confirmingDetail = true;
    }

    public function save()
    {
        $this->validate();

        $element = new Text();
        if(isset($this->element->id)) {
            $element = $this->element;
        }

        $element->textname = $this->textname;
        $element->description = $this->description;

        $element->save();

        $this->confirmingAddition = false;
    }
}
