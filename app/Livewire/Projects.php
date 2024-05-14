<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class Projects extends Component
{
    use WithFileUploads;

    public $element;

    public $name;
    public $description;
    public $banner_image;
    public $icon_image;
    public $creation_date;

    public $uploadIterationBanner = 0;
    public $uploadIterationIcon = 0;

    public $confirmingDeletion = false;
    public $confirmingAddition = false;
    public $confirmingDetail = false;

    protected $rules = [
        'name' => 'required|string|min:1',
        'description' => 'required|string|min:1',
        'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
        'icon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
        'creation_date' => 'required|date',
    ];

    public function render()
    {
        $elements = Project::get();

        return view('livewire.projects', [
            'elements' => $elements
        ]);
    }

    public function refreshElements()
    {
        $this->mount();
        $this->render();
        session()->flash('message', 'El elemento se ha agregado exitosamente');
    }

    public function confirmDeletion($id)
    {
        $this->confirmingDeletion = $id;
    }

    public function confirmAddition()
    {
        $this->reset(['element', 'name', 'description', 'banner_image', 'icon_image', 'creation_date']);
        $this->banner_image = null;
        $this->icon_image = null;
        $this->confirmingAddition = true;
    }

    public function confirmEdition(Project $element)
    {
        $this->element = $element;
        $this->name = $element->name;
        $this->description = $element->description;
        $this->banner_image = null;
        $this->icon_image = null;
        $this->creation_date = $element->creation_date;
        $this->confirmingAddition = true;
    }

    public function confirmDetail(Project $element)
    {
        $this->element = $element;
        $this->name = $element->name;
        $this->description = $element->description;
        $this->banner_image = null;
        $this->icon_image = null;
        $this->creation_date = $element->creation_date;
        $this->confirmingDetail = true;
    }

    public function deletion(Project $element)
    {
        Storage::disk('public')->delete($element->banner_img_url);
        Storage::disk('public')->delete($element->icon_url);
        $element->galleries()->delete();
        $element->types()->detach();
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
                'description' => 'required|string|min:1',
                'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
                'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
                'creation_date' => 'required|date',
            ]);
        }

        $element = new Project();
        if(isset($this->element->id)) {
            $element = $this->element;
        }

        $element->name = $this->name;
        $element->description = $this->description;
        $element->creation_date = $this->creation_date;

        if(isset($this->banner_image)) {
            if(isset($this->element->banner_img_url)) {
                Storage::disk('public')->delete($element->banner_img_url);
            }
            $element->banner_img_url = $this->banner_image->store('projects', 'public');
            $this->uploadIterationBanner++;
        }

        if(isset($this->icon_image)) {
            if(isset($this->element->icon_url)) {
                Storage::disk('public')->delete($element->icon_url);
            }
            $element->icon_url = $this->icon_image->store('projects', 'public');
            $this->uploadIterationIcon++;
        }

        $element->save();

        $this->confirmingAddition = false;
    }
}
