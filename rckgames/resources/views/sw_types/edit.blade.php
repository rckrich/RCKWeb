<!-- resources/views/sw_types/edit.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{__('general.edit_title',['object'=>trans('swtype.object')])}}</h1>
        <form action="{{ route('sw_types.update', $swType->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">{{__('general.name')}}</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $swType->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">{{__('general.btn_update')}}</button>
        </form>
        <a href="{{ route('sw_types.index') }}"  class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>
    </div>
@endsection
