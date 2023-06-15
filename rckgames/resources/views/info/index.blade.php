<!-- resources/views/info/index.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{__('info.title')}}</h1>
        <a href="{{ route('info.create') }}" class="btn btn-primary">{{__('general.btn_new',['object'=>trans('info.object')])}}</a>

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
                    <th>{{__('info.fieldname')}}</th>
                    <th>{{__('info.value')}}</th>
                    <th>{{__('info.img_url')}}</th>
                    <th>{{__('general.actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($info as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->fieldname }}</td>
                        <td>{{ $data->value }}</td>
                        <td><img src="{{asset($data->img_url) }}" alt="Info Image" class="img-thumbnail" width="100"></td>
                        <td>
                            <a href="{{ route('info.show', $data->id) }}" class="btn btn-info">{{__('general.btn_view')}}</a>
                            <a href="{{ route('info.edit', $data->id) }}" class="btn btn-primary">{{__('general.btn_edit')}}</a>
                            <form action="{{ route('info.destroy', $data->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm( '{{__('general.delete_confirm_msg',['object' => trans('info.object')])}}' )">{{__('general.btn_delete')}}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
