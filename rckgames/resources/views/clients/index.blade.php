<!-- clients/index.blade.php -->
@extends('layouts.dashboard')

@section('content')
    <h1>{{__('client.title')}}</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-2">{{__('general.btn_new',['object'=>trans('client.object')])}}</a>

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

    <table class="table">
        <thead>
            <tr>
                <th>{{__('general.id')}}</th>
                <th>{{__('general.image')}}</th>
                <th>{{__('general.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td><img src="{{asset($client->img_url) }}" alt="Client Image" class="img-thumbnail" width="100"></td>
                    <td>
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">{{__('general.btn_edit')}}</a>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm( '{{__('general.delete_confirm_msg',['object' => trans('client.object')])}}')">{{__('general.btn_delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
