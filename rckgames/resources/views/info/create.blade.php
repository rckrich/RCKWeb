<!-- resources/views/info/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('general.create_title',['object'=>trans('info.object')])}}</h1>

    <form action="{{ route('info.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="fieldname">{{__('info.fieldname')}}:</label>
            <input type="text" name="fieldname" id="fieldname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="value">{{__('info.value')}}:</label>
            <textarea type="text" name="value" id="value" class="form-control" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="img_url">{{__('info.img_url')}}:</label><br>
            <label for="img_url">{{__('general.img_file')}}:</label>
            <input type="file" name="img_url" id="img_url" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{__('general.btn_create')}}</button>
    </form>
    <a href="{{ route('info.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>

</div>
@endsection
