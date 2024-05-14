<?php

namespace App\Livewire;

use App\Models\Type;
use Livewire\Component;

class Types extends Component
{
    public $element;

    public $name;

    public $confirmingAddition = false;
    public $confirmingDetail = false;
    public $confirmingDeletion = false;

    protected $rules = [
        'name' => 'required|string|min:1',
    ];

    public function render()
    {
        $elements = Type::get();
        return view('livewire.types', [
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
        $this->reset(['element', 'name']);
        $this->confirmingAddition = true;
    }

    public function confirmDeletion($id)
    {
        $this->confirmingDeletion = $id;
    }

    public function confirmEdition(Type $element)
    {
        $this->element = $element;
        $this->name = $element->name;
        $this->confirmingAddition = true;
    }

    public function confirmDetail(Type $element)
    {
        $this->element = $element;
        $this->name = $element->name;
        $this->confirmingDetail = true;
    }

    public function deletion(Type $element)
    {
        $element->delete();
        $this->confirmingDeletion = false;
        session()->flash('message', 'El elemento se ha eliminado exitosamente');
    }

    public function save()
    {
        $this->validate();

        $element = new Type();
        if(isset($this->element->id)) {
            $element = $this->element;
        }

        $element->name = $this->name;

        $element->save();

        $this->confirmingAddition = false;
    }
}
