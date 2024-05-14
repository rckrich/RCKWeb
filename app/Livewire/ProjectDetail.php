<?php

namespace App\Livewire;

use App\Models\Gallery;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectDetail extends Component
{
    use WithFileUploads;

    public $id;
    public $project;
    public $image;
    public $tag;
    public $uploadIteration = 0;

    public $confirmingImageAddition = false;
    public $confirmingTagAddition = false;
    public $confirmingImageDeletion = false;
    public $confirmingTagDeletion = false;

    public function render()
    {
        $this->project = Project::with(['galleries', 'types'])->where('id', $this->id)->first();
        $types = Type::all();
        return view('livewire.project-detail', [
            'project' => $this->project,
            'types' => $types,
        ]);
    }

    public function refreshElements()
    {
        $this->mount();
        $this->render();
        session()->flash('message', 'El elemento se ha agregado exitosamente');
    }

    public function confirmImageDeletion($id)
    {
        $this->confirmingImageDeletion = $id;
    }

    public function confirmTagDeletion($id)
    {
        $this->confirmingTagDeletion = $id;
    }

    public function confirmImageAddition()
    {
        $this->reset(['image']);
        $this->image = null;
        $this->confirmingImageAddition = true;
    }

    public function confirmTagAddition()
    {
        $this->reset(['tag']);
        $this->tag = null;
        $this->confirmingTagAddition = true;
    }

    public function imageDeletion(Gallery $element)
    {
        Storage::disk('public')->delete($element->img_url);
        $element->delete();
        $this->confirmingImageDeletion = false;
        session()->flash('message', 'El elemento se ha eliminado exitosamente');
    }

    public function saveImage()
    {
        $this->validate([
            'image' => 'required|file|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp,video/mp4,video/quicktime,video/x-msvideo,video/mpeg,video/mov,video/avi|max:1048576',
        ]);

        $element = new Gallery();
        $element->project_id = $this->id;
        $element->img_url = $this->image->store('gallery', 'public');
        $element->save();

        $this->uploadIteration++;
        $this->confirmingImageAddition = false;
}

    public function tagDeletion(Type $element)
    {
        $this->project->types()->detach($element->id);
        $this->confirmingTagDeletion = false;
        session()->flash('message', 'El elemento se ha eliminado exitosamente');
    }

    public function saveTag()
    {
        $this->project->types()->attach($this->tag);

        $this->confirmingTagAddition = false;
    }
}
