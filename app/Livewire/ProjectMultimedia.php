<?php

namespace App\Livewire;

use App\Models\Gallery;
use App\Models\Project;
use App\Models\ProjectLink;
use App\Models\ProjectVideo;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectMultimedia extends Component
{
    use WithFileUploads;

    public $id;
    public $project;
    public $image;
    public $tag;
    public $text;
    public $url;
    public $video;
    public $element;
    public $uploadIteration = 0;

    public $confirmingImageAddition = false;
    public $confirmingTagAddition = false;
    public $confirmingLinkAddition = false;
    public $confirmingVideoAddition = false;
    public $confirmingImageDeletion = false;
    public $confirmingTagDeletion = false;
    public $confirmingLinkDeletion = false;
    public $confirmingVideoDeletion = false;

    public function render()
    {
        $this->project = Project::with(['galleries', 'types', 'links', 'videos'])->where('id', $this->id)->first();
        $types = Type::all();
        return view('livewire.project-multimedia', [
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

    public function confirmImageDeletion(Gallery $element)
    {
        $this->reset(['element']);
        $this->element = $element;
        $this->confirmingImageDeletion = true;
    }

    public function confirmTagDeletion(Type $element)
    {
        $this->reset(['element', 'tag']);
        $this->element = $element;
        $this->tag = $element->name;
        $this->confirmingTagDeletion = true;
    }

    public function confirmLinkDeletion(ProjectLink $element)
    {
        $this->reset(['element', 'text']);
        $this->element = $element;
        $this->text = $element->text;
        $this->confirmingLinkDeletion = true;
    }

    public function confirmVideoDeletion(ProjectVideo $element)
    {
        $this->reset(['element', 'video']);
        $this->element = $element;
        $this->video = $element->url;
        $this->confirmingVideoDeletion = true;
    }

    public function confirmImageAddition()
    {
        $this->reset(['element', 'image']);
        $this->image = null;
        $this->confirmingImageAddition = true;
    }

    public function confirmTagAddition()
    {
        $this->reset(['element', 'tag']);
        $this->tag = null;
        $this->confirmingTagAddition = true;
    }

    public function confirmLinkAddition()
    {
        $this->reset(['element', 'text', 'url']);
        $this->text = null;
        $this->url = null;
        $this->confirmingLinkAddition = true;
    }

    public function confirmLinkEdition(ProjectLink $element)
    {
        $this->element = $element;
        $this->text = $element->text;
        $this->url = $element->url;
        $this->confirmingLinkAddition = true;
    }

    public function confirmVideoAddition()
    {
        $this->reset(['element', 'video']);
        $this->video = null;
        $this->confirmingVideoAddition = true;
    }

    public function confirmVideoEdition(ProjectVideo $element)
    {
        $this->element = $element;
        $this->video = $element->url;
        $this->confirmingVideoAddition = true;
    }

    public function imageDeletion()
    {
        $element = $this->element;
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

    public function tagDeletion()
    {
        $element = $this->element;
        $this->project->types()->detach($element->id);
        $this->confirmingTagDeletion = false;
        session()->flash('message', 'El elemento se ha eliminado exitosamente');
    }

    public function saveTag()
    {
        $this->project->types()->attach($this->tag);

        $this->confirmingTagAddition = false;
    }

    public function linkDeletion()
    {
        $element = $this->element;
        $element->delete();
        $this->confirmingLinkDeletion = false;
        session()->flash('message', 'El elemento se ha eliminado exitosamente');
    }

    public function saveLink()
    {
        $element = new ProjectLink();
        if(isset($this->element->id)) {
            $element = $this->element;
        }

        $element->text = $this->text;
        $element->url = $this->url;
        $element->project_id = $this->project->id;
        $element->save();

        $this->confirmingLinkAddition = false;
    }

    public function videoDeletion()
    {
        $element = $this->element;
        $element->delete();
        $this->confirmingVideoDeletion = false;
        session()->flash('message', 'El elemento se ha eliminado exitosamente');
    }

    public function saveVideo()
    {
        $element = new ProjectVideo();
        if(isset($this->element->id)) {
            $element = $this->element;
        }

        $element->url = $this->video;
        $element->project_id = $this->project->id;
        $element->save();

        $this->confirmingVideoAddition = false;
    }
}
