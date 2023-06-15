<!-- resources/views/sw_types/index.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{__('swtype.title')}}</h1>
        <a href="{{ route('sw_types.create') }}" class="btn btn-primary">{{__('general.btn_new',['object'=>trans('swtype.object')])}}</a>
        
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>{{__('general.id')}}</th>
                    <th>{{__('general.name')}}</th>
                    <th>{{__('general.actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($swTypes as $swType)
                    <tr>
                        <td>{{ $swType->id }}</td>
                        <td>{{ $swType->name }}</td>
                        <td>
                            <a href="{{ route('sw_types.show', $swType->id) }}" class="btn btn-info">{{__('general.btn_view')}}</a>
                            <a href="{{ route('sw_types.edit', $swType->id) }}" class="btn btn-primary">{{__('general.btn_edit')}}</a>
                            <form action="{{ route('sw_types.destroy', $swType->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm( '{{__('general.delete_confirm_msg',['object' => trans('swtype.object')])}}' )">{{__('general.btn_delete')}}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
