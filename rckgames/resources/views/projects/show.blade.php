<!-- resources/views/projects/show.blade.php -->

@extends('layouts.dashboard')

@section('content')
<div class="container py-5">
    <h1>{{__('general.show_title',['object'=>trans('project.object')])}}</h1>
    <div class="row pb-3">
        <div class="col-lg-5 col-md-5 col-sm-12 col-12 p-4">
            <strong>{{__('project.banner_img')}}:</strong>
            <img id="project-banner" src="{{asset($project->banner_img_url) }}" alt="Banner Image" class="w-100">                    
            <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>

        </div>
        <div class="col-lg-7 col-md-7 col-sm-12 col-12 p-4">
            <div class="row">
                <div class="col-2">
                    <strong>{{__('project.icon_img')}}:</strong>
                    <img id="project-icon" src="{{asset($project->icon_url) }}" alt="Icon Image" class="w-100">
                </div>
                <div class="col">
                    <h2 id="project-name"><strong>{{__('general.name')}}: </strong>{{ $project->name }}</h2>    
                </div>
            </div>
            <div class="row py-5">
                <p><strong>{{__('general.id')}}: </strong> {{ $project->id }}</p>
                <p class="project-description"><strong>{{__('general.description')}}: </strong>{{ $project->description }}</p>
                <p><strong>{{__('project.creation_date')}}:</strong> {{ $project->creation_date }}</p>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <hr/>
    <h2>{{__('project.galleries.title')}}:</h2>
    <a href="{{ route('galleries.create', $project->id) }}" class="btn btn-primary">{{__('general.btn_add',['object'=>trans('project.galleries.object')])}}</a>
    <div class="row">
        @if(count($galleries) > 0)
        @foreach($galleries as $gallery)
        <div class="col">
            <img src="{{asset($gallery->img_url) }}" alt="Gallery Image" class="img-thumbnail" width="100"/>
            <form action="{{ route('galleries.destroy', $gallery) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm( '{{__('general.delete_confirm_msg',['object' => trans('project.galleries.object')])}}')">{{__('general.btn_delete')}}</button>
            </form>
        </div>
        @endforeach
        @else
            <p>{{ __('No galleries found.') }}</p>
        @endif
    </div>
    <hr/>
    <h2>{{__('project.project_types.title')}}:</h2>
    <a href="{{ route('project_types.create', $project->id) }}" class="btn btn-primary">{{__('general.btn_add',['object'=>trans('project.project_types.object')])}}</a>
    @if(count($projectTypes) > 0)
    @foreach($projectTypes as $projectType)
        <div class="badge badge-primary">{{ $projectType->name }}</div>
        <form action="{{ route('project_types.destroy', ['project' => $project, 'projectType' => $projectType->project_type_id]) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm( '{{__('general.delete_confirm_msg',['object' => trans('project.project_types.object')])}}')">{{__('general.btn_delete')}}</button>
        </form>
    @endforeach
    @else
        <p>{{ __('No types found.') }}</p>
    @endif

</div>
@endsection
