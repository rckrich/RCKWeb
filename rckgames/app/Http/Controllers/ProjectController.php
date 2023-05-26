<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\SwType;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $swTypes = SwType::all();
        return view('projects.create', compact('swTypes'));
    }

    /**
     * Store a newly created project in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'banner_img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'icon_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'creation_date' => 'required|date',
            ]);

            if ($request->hasFile('banner_img_url')) {
                $bannerUrl = $data['banner_img_url']->store('public/images/projects/banners');
                $data['banner_img_url'] = str_replace('public/', 'storage/', $bannerUrl);
            }

            if ($request->hasFile('icon_url')) {
                $iconUrl = $data['icon_url']->store('public/images/projects/icons');
                $data['icon_url'] = str_replace('public/', 'storage/', $iconUrl);
            }

            Project::create($data);

            $message = trans('general.success_store',['object' => trans('project.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_store',['object' => trans('project.object')]);
            $status = 'error';
        }
        return redirect()->route('projects.index')->with($status, $message);
    }

    /**
     * Display the specified project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
        //$swTypes = SwType::all();
        //return view('projects.show', compact('swTypes'));
    }

    /**
     * Show the form for editing the specified project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //$swTypes = SwType::all();
        //return view('projects.edit', compact('project', 'swTypes'));
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified project in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        try{
            $data = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'banner_img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'icon_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'creation_date' => 'required|date',
                //'project_types' => 'required|array',
                //'project_types.*' => 'exists:sw_types,id',

            ]);
            
            if (isset($data['banner_img_url'])) {
                $bannerUrl = $data['banner_img_url']->store('public/images/projects/banners');
                $data['banner_img_url'] = str_replace('public/', 'storage/', $bannerUrl);
            } else {
                unset($data['img_url']);
            }

            if (isset($data['icon_url'])) {
                $iconUrl = $data['icon_url']->store('public/images/projects/icons');
                $data['icon_url'] = str_replace('public/', 'storage/', $iconUrl);
            } else {
                unset($data['icon_url']);
            }

            $project->update($data);

            $message = trans('general.success_update',['object' => trans('project.object')]);
            $status = 'success';
        }
        catch ( \Exception $e ) {
            $message = trans('general.error_update',['object' => trans('project.object')]);
            $status = 'error';
        }
        return redirect()->route('projects.index')->with($status, $message);
    }

    /**
     * Remove the specified project from the database.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try{
            $project->delete();
            $message = trans('general.success_destroy',['object' => trans('project.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_destroy',['object' => trans('project.object')]);
            $status = 'error';
        }

        return redirect()->route('projects.index')->with($status, $message);
    }
}
