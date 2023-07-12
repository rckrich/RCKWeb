<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\SwType;
use App\Models\Gallery;
use Illuminate\Validation\Rule;


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
                'banner_img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
                'icon_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
                'creation_date' => 'required|date',
            ]);

            if ($request->hasFile('banner_img_url')) {
                //$bannerUrl = $data['banner_img_url']->store('public/images/projects/banners');
                //$data['banner_img_url'] = str_replace('public/', 'storage/', $bannerUrl);
                $bannerUrl = Storage::putFile('public/images/projects/banners', $data['banner_img_url']);
                $data['banner_img_url'] = Storage::url($bannerUrl);
            }

            if ($request->hasFile('icon_url')) {
                //$iconUrl = $data['icon_url']->store('public/images/projects/icons');
                //$data['icon_url'] = str_replace('public/', 'storage/', $iconUrl);
                $iconUrl = Storage::putFile('public/images/projects/icons', $data['icon_url']);
                $data['icon_url'] = Storage::url($iconUrl);
            }

            Project::create($data);

            $message = trans('general.success_store',['object' => trans('project.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_store',['object' => trans('project.object')])."\r\n".$e->getMessage();
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
        $galleries = Gallery::where('project_id', $project->id)->get();
        $projectTypes = ProjectType::select('project_types.id AS project_type_id','project_types.project_id','sw_types.name')->where('project_id', $project->id)->join('sw_types', 'project_types.swtype_id', '=', 'sw_types.id')->get();
        return view('projects.show', compact('project', 'galleries', 'projectTypes'));
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
                'name' => '',
                'description' => '',
                'banner_img_url' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
                'icon_url' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
                'creation_date' => 'date',
                //'project_types' => 'required|array',
                //'project_types.*' => 'exists:sw_types,id',

            ]);
            
            if (isset($data['banner_img_url'])) {
                //$bannerUrl = $data['banner_img_url']->store('public/images/projects/banners');
                //$data['banner_img_url'] = str_replace('public/', 'storage/', $bannerUrl);
                $bannerUrl = Storage::putFile('public/images/projects/banners', $data['banner_img_url']);
                $data['banner_img_url'] = Storage::url($bannerUrl);
            } else {
                unset($data['img_url']);
            }

            if (isset($data['icon_url'])) {
                //$iconUrl = $data['icon_url']->store('public/images/projects/icons');
                //$data['icon_url'] = str_replace('public/', 'storage/', $iconUrl);
                $iconUrl = Storage::putFile('public/images/projects/icons', $data['icon_url']);
                $data['icon_url'] = Storage::url($iconUrl);
            } else {
                unset($data['icon_url']);
            }

            $project->update($data);

            $message = trans('general.success_update',['object' => trans('project.object')]);
            $status = 'success';
        }
        catch ( \Exception $e ) {
            $message = trans('general.error_update',['object' => trans('project.object')])."\r\n".$e->getMessage();
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
            $message = trans('general.error_destroy',['object' => trans('project.object')])."\r\n".$e->getMessage();
            $status = 'error';
        }

        return redirect()->route('projects.index')->with($status, $message);
    }
    
    //--------------------------------------------------------------------------
    /**
     * Show the form for creating a new project type.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function createProjectType(Project $project)
    {
        $swTypes = SwType::all();
        return view('project_types.create', compact('project', 'swTypes'));
    }

    /**
     * Store a newly created project type in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function storeProjectType(Request $request, Project $project)
    {
        try {

            $data = $request->validate([
                'swtype_id' => 'required|exists:sw_types,id',
            ]);

            $data['project_id'] = $project->id;
            $data['swtype_id'] = $request->swtype_id;
            $projectType = ProjectType::create($data);

            $message = trans('general.success_load', ['object' => trans('project.project_types.object')]);
            $status = 'success';
        } catch (\Exception $e) {
            $message = trans('general.error_load', ['object' => trans('project.project_types.object')])."\r\n".$e->getMessage();
            $status = 'error';
        }

        return redirect()->route('projects.show', ['project' => $project])->with($status, $message);
    }

    /**
     * Remove the specified project type from the database.
     *
     * @param  \App\Models\Project  $project
     * @param  int  $projectType
     * @return \Illuminate\Http\Response
     */
    public function destroyProjectType(Project $project, $projectType)
    {
        try {
            $projectTypeModel = ProjectType::findOrFail($projectType);

            $projectTypeModel->delete();
    
            $message = trans('general.success_destroy',['object' => trans('project.project_types.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_destroy',['object' => trans('project.project_types.object')])."\r\n".$e->getMessage();
            $status = 'error';
        }
        return redirect()->route('projects.show', ['project' => $project])->with($status, $message);
    }


}
