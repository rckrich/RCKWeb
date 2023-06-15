@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{__('general.btn_add',['object'=>trans('project.galleries.object')])}}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('galleries.store', $project) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="img_url">{{__('general.img_file')}}</label>
                                <input type="file" name="img_url" id="img_url" class="form-control-file" required>
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
