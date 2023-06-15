<!-- resources/views/projects/index.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <h1>{{__('project.title')}}</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">{{__('general.btn_new',['object'=>trans('project.object')])}}</a>
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
    <table class="table mt-3">
        <thead>
            <tr>
                <th>{{__('general.id')}}</th>
                <th>{{__('general.name')}}</th>
                <th>{{__('general.description')}}</th>
                <th>{{__('project.banner_img')}}</th>
                <th>{{__('project.icon_img')}}</th>
                <th>{{__('project.creation_date')}}</th>
                <th>{{__('general.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td><img src="{{asset($project->banner_img_url) }}" alt="Banner Image" class="img-thumbnail" width="100"></td>
                    <td><img src="{{asset($project->icon_url) }}" alt="Icon Image" class="img-thumbnail" width="100"></td>
                    <td>{{ $project->creation_date }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info">{{__('general.btn_view')}}</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">{{__('general.btn_edit')}}</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm( '{{__('general.delete_confirm_msg',['object' => trans('project.object')])}}' )">{{__('general.btn_delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
