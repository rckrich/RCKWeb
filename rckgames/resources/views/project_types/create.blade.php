@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{__('general.btn_add',['object'=>trans('project.project_types.object')])}}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('project_types.store', $project) }}">
                            @csrf
                            <div class="form-group">
                                <label for="swtype_id">{{__('project.project_type')}}</label>
                                <select id="swtype_id" name="swtype_id" class="form-control" required>
                                @foreach ($swTypes as $option)
                                    <option value="{{$option->id}}">{{$option->name}}</option>
                                @endforeach
                                </select>
                                
                            </div>
                           
                            <button type="submit" class="btn btn-primary mt-3">{{__('general.btn_load')}}</button>
   
                        </form>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-secondary">{{__('general.btn_return')}}</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
