<!-- resources/views/projects/edit.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Edit Project</h2>
        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">{{__('general.name')}}</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}"  required>
            </div>

            <div class="form-group">
                <label for="description">{{__('general.description')}}</label>
                <textarea name="description" id="description" class="form-control" required>{{ $project->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="banner_img_url">{{__('project.banner_img')}}</label>
                <input type="file" name="banner_img_url" id="banner_img_url" class="form-control-file" required>
                <img src="{{asset($project->banner_img_url) }}" alt="Banner Image" class="img-thumbnail" width="100">
            </div>

            <div class="form-group">
                <label for="icon_url">{{__('project.icon_img')}}</label>
                <input type="file" name="icon_url" id="icon_url" class="form-control-file" required>
                <img src="{{asset($project->icon_url) }}" alt="Icon Image" class="img-thumbnail" width="100">
            </div>

            <div class="form-group">
                <label for="creation_date">{{__('project.creation_date')}}</label>
                <input type="date" name="creation_date" id="creation_date" class="form-control" value="{{ $project->creation_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">{{__('general.btn_update')}}</button>
        </form>        
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>

    </div>
@endsection
