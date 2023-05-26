<!-- resources/views/texts/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('general.create_title',['object'=>trans('text.object')])}}</h1>

    <form action="{{ route('texts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="textname">{{__('text.textname')}}:</label>
            <input type="text" name="textname" id="textname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">{{__('text.description')}}:</label>
            <textarea type="text" name="description" id="description" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{__('general.btn_create')}}</button>
    </form>
    <a href="{{ route('texts.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>

</div>
@endsection
