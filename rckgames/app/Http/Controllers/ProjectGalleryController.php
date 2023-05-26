<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectGallery;
use Illuminate\Http\Request;

class ProjectGalleryController extends Controller
{
    public function create(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imgUrl = $data['img_url']->store('public/images/gallery');
        $data['img_url'] = asset('storage/' . $imgUrl);

        $project->galleries()->create($data);

        return redirect()->route('projects.show', $project)->with('success', 'Image added successfully.');
    }

    public function destroy(Project $project, ProjectGallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('projects.show', $project)->with('success', 'Image deleted successfully.');
    }
}
