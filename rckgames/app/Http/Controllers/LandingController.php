<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Text;
use App\Models\RckInfo;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class LandingController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $texts = collect(Text::all());
        $info = RckInfo::all();
        $projects = Project::orderBy('creation_date','desc')->get();

        return view('home.index', compact('clients','texts','info','projects',));
    }
    
    /**
     * Display the specified project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show_project(Project $project)
    {
        $texts = collect(Text::all());
        $galleries = Gallery::where('project_id', $project->id)->get();
        $projectTypes = ProjectType::select('project_types.id AS project_type_id','project_types.project_id','sw_types.name')->where('project_id', $project->id)->join('sw_types', 'project_types.swtype_id', '=', 'sw_types.id')->get();
        return view('projects.show_project', compact('project', 'galleries', 'projectTypes','texts'));
    }
}

