<!-- clients/edit.blade.php -->
@extends('layouts.dashboard')

@section('content')
    <h1>{{__('general.edit_title',['object'=>trans('client.object')])}}</h1>

    <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="img_url">{{__('general.img_file')}}</label>
            <input type="file" name="img_url" id="img_url" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">{{__('general.btn_update')}}</button>
    </form>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>
@endsection
