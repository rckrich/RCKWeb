<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        try{
            $data = $request->validate([
                'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:50000',
            ]);
    
            $imgUrl = $data['img_url']->store('public/images/clients');
            $data['img_url'] = str_replace('public/', 'storage/', $imgUrl);
    
            Client::create($data);
            $message = trans('general.success_store',['object' => trans('client.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_store',['object' => trans('client.object')])."\r\n".$e->getMessage();
            $status = 'error';
        }
        return redirect()->route('clients.index')->with($status, $message);
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        try{
            $data = $request->validate([
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:50000',
            ]);

            if (isset($data['img_url'])) {
                $imgUrl = $data['img_url']->store('public/images/clients');
                $data['img_url'] = str_replace('public/', 'storage/', $imgUrl);
            } else {
                unset($data['img_url']);
            }

            $client->update($data);
            $message = trans('general.success_update',['object' => trans('client.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_update',['object' => trans('client.object')])."\r\n".$e->getMessage();
            $status = 'error';
        }

        return redirect()->route('clients.index')->with($status, $message);
    }
    
    public function destroy(Client $client)
    {
        try{
            $client->delete();
            $message = trans('general.success_destroy',['object' => trans('client.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_destroy',['object' => trans('client.object')])."\r\n".$e->getMessage();
            $status = 'error';
        }

        return redirect()->route('clients.index')->with($status, $message);
    }
}
