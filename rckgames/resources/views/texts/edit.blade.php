<!-- resources/views/texts/edit.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{__('general.edit_title',['object'=>trans('text.object')])}}</h1>

        <form action="{{ route('texts.update', $text) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="textname">{{__('text.textname')}}:</label>
                <input type="text" name="textname" id="textname" class="form-control" value="{{ $text->textname }}" required>
            </div>

            <div class="form-group">
                <label for="description">{{__('text.description')}}:</label>
                <textarea name="description" id="description" class="form-control" value="{{ $text->description }}" required>{{ $text->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">{{__('general.btn_update')}}</button>
        </form>
        <a href="{{ route('texts.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>
    </div>
@endsection
