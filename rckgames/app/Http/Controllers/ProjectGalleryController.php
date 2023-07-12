<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use App\Models\Project;

class ProjectGalleryController extends Controller
{

    /**
     * Show the form for creating a new gallery.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('gallery.create', compact('project'));
    }

    /**
     * Store a newly created gallery in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
       
        try{
            //$mimeType = $request->img_url->getMimeType();
            $data = $request->validate([
                'img_url' => 'required|file|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp,video/mp4,video/quicktime,video/x-msvideo,video/mpeg,video/mov,video/avi|max:1048576',
            ],);

            if ($request->hasFile('img_url')) {
                //$imgUrl = $data['img_url']->store('public/images/gallery');
                //$data['img_url'] = str_replace('public/', 'storage/', $imgUrl);
                $imgUrl = Storage::putFile('public/images/gallery', $data['img_url']);
                $data['img_url'] = Storage::url($imgUrl);

                $data['project_id'] = $project->id;
        
                Gallery::create($data);

                $message = trans('general.success_load',['object' => trans('project.galleries.object')]);
                $status = 'success';
            }
        } catch ( \Exception $e ) {
            $message = trans('general.error_load',['object' => trans('project.galleries.object')])."\r\n".$e->getMessage();
            $status = 'error';
        }
        return redirect()->route('projects.show', $project)->with($status, $message);
    }

    /**
     * Remove the specified gallery from the database.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        try{
            $project = $gallery->project;
            $gallery->delete();
    
            $message = trans('general.success_destroy',['object' => trans('project.galleries.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_destroy',['object' => trans('project.galleries.object')])."\r\n".$e->getMessage();
            $status = 'error';
        }

        return redirect()->route('projects.show', $project)->with($status, $message);
    }
}
