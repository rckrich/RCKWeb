<!-- resources/views/sw_types/create.blade.php -->

@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>{{__('general.create_title',['object'=>trans('swtype.object')])}}</h1>

    <form action="{{ route('sw_types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">{{__('general.name')}}</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">{{__('general.btn_create')}}</button>
    </form>
    <a href="{{ route('sw_types.index') }}"  class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>

</div>
@endsection
