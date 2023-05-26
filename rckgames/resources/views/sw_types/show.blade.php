<!-- resources/views/sw_types/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{__('general.show_title',['object'=>trans('swtype.object')])}}</h1>
        <div>
            <p><strong>{{__('general.id')}}:</strong> {{ $swType->id }}</p>            
            <p><strong>{{__('general.name')}}:</strong> {{ $swType->name }}</p>
        </div>
        <a href="{{ route('sw_types.index') }}"  class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>
    </div>
@endsection
