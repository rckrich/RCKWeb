<?php

namespace App\Livewire;

use App\Models\RckInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class Contact extends Component
{
    use WithFileUploads;

    public $element;

    public $fieldname;
    public $value;
    public $image;

    public $uploadIteration = 0;

    public $confirmingDeletion = false;
    public $confirmingAddition = false;
    public $confirmingDetail = false;

    protected $rules = [
        'fieldname' => 'required|string|min:1',
        'value' => 'required|string|min:1',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
    ];

    public function render()
    {
        $elements = RckInfo::get();
        return view('livewire.contact', [
            'elements' => $elements
        ]);
    }

    public function refreshElements()
    {
        $this->mount();
        $this->render();
        session()->flash('message', 'El elemento se ha agregado exitosamente');
    }

    public function confirmDeletion(RckInfo $element)
    {
        $this->reset(['element', 'fieldname', 'value', 'image']);
        $this->element = $element;
        $this->fieldname = $element->fieldname;
        $this->confirmingDeletion = true;
    }

    public function confirmAddition()
    {
        $this->reset(['element', 'fieldname', 'value', 'image']);
        $this->image = null;
        $this->confirmingAddition = true;
    }

    public function confirmEdition(RckInfo $element)
    {
        $this->element = $element;
        $this->fieldname = $element->fieldname;
        $this->value = $element->value;
        $this->image = null;
        $this->confirmingAddition = true;
    }

    public function confirmDetail(RckInfo $element)
    {
        $this->element = $element;
        $this->fieldname = $element->fieldname;
        $this->value = $element->value;
        $this->image = null;
        $this->confirmingDetail = true;
    }

    public function deletion()
    {
        $element = $this->element;
        Storage::disk('public')->delete($element->img_url);
        $element->delete();
        Log::channel('deletes')->info(Auth::user()->id . ' ' . Auth::user()->email . ' - eliminó el contacto ' . $element->id . ' ' . $element->fieldname);
        $this->confirmingDeletion = false;
        session()->flash('message', 'El elemento se ha eliminado exitosamente');
    }

    public function save()
    {
        if(!isset($this->element->id)){
            $this->validate();
        } else {
            $this->validate([
                'fieldname' => 'required|string|min:1',
                'value' => 'required|string|min:1',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
            ]);
        }

        $element = new RckInfo();
        if(isset($this->element->id)) {
            $element = $this->element;
        }

        $element->fieldname = $this->fieldname;
        $element->value = $this->value;

        if(isset($this->image)) {
            if(isset($this->element->img_url)) {
                Storage::disk('public')->delete($element->img_url);
            }
            $element->img_url = $this->image->store('info', 'public');
        }
        $element->save();

        $this->uploadIteration++;
        $this->confirmingAddition = false;
    }
}
