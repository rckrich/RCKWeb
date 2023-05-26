<!-- resources/views/projects/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('general.show_title',['object'=>trans('project.object')])}}</h1>
    <div>
        <p><strong>{{__('general.id')}}:</strong> {{ $project->id }}</p>
        <p><strong>{{__('general.name')}}:</strong> {{ $project->name }}</p>
        <p><strong>{{__('general.description')}}:</strong> {{ $project->description }}</p>
        <p><strong>{{__('project.banner_img')}}:</strong></p>
        <div><img src="{{asset($project->banner_img_url) }}" alt="Banner Image" class="img-thumbnail" width="100"></div>
        <p><strong>{{__('project.icon_img')}}:</strong></p>
        <div><img src="{{asset($project->icon_url) }}" alt="Icon Image" class="img-thumbnail" width="100"></div>
        <p><strong>{{__('project.creation_date')}}:</strong> {{ $project->creation_date }}</p>
    </div>

    <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>


</div>
@endsection
