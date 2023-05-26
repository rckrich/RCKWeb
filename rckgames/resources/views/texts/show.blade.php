<!-- resources/views/texts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{__('general.show_title',['object'=>trans('text.object')])}}</h1>
        <div>
            <p><strong>{{__('general.id')}}:</strong> {{ $text->id }}</p>
            <p><strong>{{__('text.textname')}}:</strong> {{ $text->textname }}</p>
            <p><strong>{{__('text.description')}}:</strong> {{ $text->description }}</p>
        </div>
        <a href="{{ route('texts.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>
    </div>
@endsection
