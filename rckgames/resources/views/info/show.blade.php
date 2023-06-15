<!-- resources/views/info/show.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{__('general.show_title',['object'=>trans('info.object')])}}</h1>
        <div>
            <p><strong>{{__('general.id')}}:</strong> {{ $info->id }}</p>
            <p><strong>{{__('info.fieldname')}}:</strong> {{ $info->fieldname }}</p>
            <p><strong>{{__('info.value')}}:</strong> {{ $info->value }}</p>
            <div>
                <img src="{{asset($info->img_url)}}" alt="Info Image" class="img-thumbnail" width="100">
            </div>
        </div>
        <a href="{{ route('info.index') }}" class="btn btn-secondary mt-3">{{__('general.btn_return')}}</a>
    </div>
@endsection
