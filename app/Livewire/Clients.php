<?php

namespace App\Livewire;

use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Clients extends Component
{
    use WithFileUploads;

    public $element;

    public $name;
    public $image;

    public $uploadIteration = 0;

    public $confirmingDeletion = false;
    public $confirmingAddition = false;

    protected $rules = [
        'name' => 'required|string|min:1',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
    ];
    public function render()
    {
        $elements = Client::get();
        return view('livewire.clients', [
            'elements' => $elements
        ]);
    }

    public function refreshElements()
    {
        $this->mount();
        $this->render();
        session()->flash('message', 'El elemento se ha agregado exitosamente');
    }

    public function confirmDeletion(Client $element)
    {
        $this->reset(['element', 'name', 'image']);
        $this->element = $element;
        $this->name = $element->name;
        $this->confirmingDeletion = true;
    }

    public function confirmAddition()
    {
        $this->reset(['element', 'name', 'image']);
        $this->name = null;
        $this->image = null;
        $this->confirmingAddition = true;
    }

    public function confirmEdition(Client $element)
    {
        $this->element = $element;
        $this->name = $element->name;
        $this->image = null;
        $this->confirmingAddition = true;
    }

    public function deletion()
    {
        $element = $this->element;
        Storage::disk('public')->delete($element->img_url);
        $element->delete();
        $this->confirmingDeletion = false;
        session()->flash('message', 'El elemento se ha eliminado exitosamente');
    }

    public function save()
    {
        if(!isset($this->element->id)){
            $this->validate();
        } else {
            $this->validate([
                'name' => 'required|string|min:1',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
            ]);
        }

        $element = new Client();
        if(isset($this->element->id)) {
            $element = $this->element;
        }

        if(isset($this->image)) {
            if(isset($this->element->img_url)) {
                Storage::disk('public')->delete($element->img_url);
            }
            $element->img_url = $this->image->store('clients', 'public');
        }
        $element->name = $this->name;
        $element->save();

        $this->uploadIteration++;
        $this->confirmingAddition = false;
    }
}
