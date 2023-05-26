<!-- resources/views/info/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{__('general.edit_title',['object'=>trans('info.object')])}}</h1>

        <form action="{{ route('info.update', $info) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="fieldname">{{__('info.fieldname')}}:</label>
                <input type="text" name="fieldname" id="fieldname" class="form-control" value="{{ $info->fieldname }}" required>
            </div>

            <div class="form-group">
                <label for="value">{{__('info.value')}}:</label>
                <textarea type="text" name="value" id="value" class="form-control" value="{{ $info->value }}" required>{{ $info->value }}</textarea>
            </div>
            
            @isset($info->img_url)
            <!--div class="form-group">
                <label for="current_img_url">{{__('general.current_img')}}:</label>
                <img id="current_img_url" name="current_img_url" src="{{asset($info->img_url)}}" alt="Info Image" class="img-thumbnail" width="100">
            </div-->
            @endisset

            <div class="form-group">
                <label for="img_url">{{__('info.img_url')}}:</label><br>
                <label for="img_url">{{__('general.img_file')}}:</label>
                <input type="file" name="img_url" id="img_url" class="form-control-file" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">{{__('general.btn_update')}}</button>
        </form>
        <a href="{{ route('info.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>
    </div>
@endsection
