<?php

namespace App\Http\Controllers;

use App\Models\RckInfo;
use Illuminate\Http\Request;

class RCKInfoController extends Controller
{
    public function index()
    {
        $info = RckInfo::all();
        return view('info.index', compact('info'));
    }

    public function create()
    {
        return view('info.create');
    }

    public function store(Request $request)
    {
        try{
           $data = $request->validate([
                'fieldname' => 'required',
                'value' => 'required',
                'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:50000',
            ]);

            $imgUrl = $data['img_url']->store('public/images/info');
            $data['img_url'] = str_replace('public/', 'storage/', $imgUrl);

            RckInfo::create($data); 
            
            $message = trans('general.success_store',['object' => trans('info.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_store',['object' => trans('info.object')]);
            $status = 'error';
        }
        return redirect()->route('info.index')->with($status, $message);
    }

    public function show(RckInfo $info)
    {
        return view('info.show', compact('info'));
    }

    public function edit(RckInfo $info)
    {
        return view('info.edit', compact('info'));
    }

    public function update(Request $request, RckInfo $info)
    {
        try{
            $data = $request->validate([
                'fieldname' => 'required',
                'value' => 'required',
                'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:50000',
            ]);

            if (isset($data['img_url'])) {
                $imgUrl = $data['img_url']->store('public/images/info');
                $data['img_url'] = str_replace('public/', 'storage/', $imgUrl);
            } else {
                unset($data['img_url']);
            }

            $info->update($data);
            $message = trans('general.success_update',['object' => trans('info.object')]);
            $status = 'success';
        }
        catch ( \Exception $e ) {
            $message = trans('general.error_update',['object' => trans('info.object')]);
            $status = 'error';
        }
        return redirect()->route('info.index')->with($status, $message);
    }

    public function destroy(RckInfo $info)
    {
        try{
            $info->delete();
            $message = trans('general.success_destroy',['object' => trans('info.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_destroy',['object' => trans('info.object')]);
            $status = 'error';
        }

        return redirect()->route('info.index')->with($status, $message);
    }
}
