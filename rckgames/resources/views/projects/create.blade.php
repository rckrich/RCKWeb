@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{__('general.create_title',['object'=>trans('project.object')])}}</h1>
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">{{__('general.name')}}</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">{{__('general.description')}}</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="banner_img_url">{{__('project.banner_img')}}</label>
                <input type="file" name="banner_img_url" id="banner_img_url" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="icon_url">{{__('project.icon_img')}}</label>
                <input type="file" name="icon_url" id="icon_url" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="creation_date">{{__('project.creation_date')}}</label>
                <input type="date" name="creation_date" id="creation_date" class="form-control" required>
            </div>

            <!--div class="form-group">
                <label for="project_types">Project Types</label>
                <select name="project_types[]" id="project_types" class="form-control" multiple>
                    @foreach($swTypes as $swType)
                        <option value="{{ $swType->id }}">{{ $swType->name }}</option>
                    @endforeach
                </select>
            </div-->

            <button type="submit" class="btn btn-primary">{{__('general.btn_create')}}</button>
        </form>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>

    </div>
@endsection
