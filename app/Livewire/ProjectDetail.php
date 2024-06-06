<?php

namespace App\Livewire;

use App\Models\Gallery;
use App\Models\Project;
use App\Models\ProjectLink;
use App\Models\ProjectType;
use App\Models\ProjectVideo;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectDetail extends Component
{
    use WithFileUploads;

    public $id;
    public $project;

    public function render()
    {
        $this->project = Project::with(['galleries', 'types', 'links', 'videos'])->where('id', $this->id)->first();
        $types = Type::all();
        return view('livewire.project-detail', [
            'project' => $this->project,
            'types' => $types,
        ]);
    }
}
