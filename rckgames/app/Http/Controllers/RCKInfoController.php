<?php

namespace App\Http\Controllers;

use App\Models\RckInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
            ]);

            if ($request->hasFile('img_url')) {   
                //$imgUrl = $data['img_url']->store('public/images/info');
                //$data['img_url'] = str_replace('public/', 'storage/', $imgUrl);
                $imgUrl = Storage::putFile('public/images/info', $data['img_url']);
                $data['img_url'] = Storage::url($imgUrl);
            }
         
            RckInfo::create($data); 
            
            $message = trans('general.success_store',['object' => trans('info.object')]);
            $status = 'success';
           
        } catch ( \Exception $e ) {
            $message = trans('general.error_store',['object' => trans('info.object')])."\r\n".$e->getMessage();
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
                'img_url' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:1073741824',
            ]);

            if (isset($data['img_url'])) {
                //$imgUrl = $data['img_url']->store('public/images/info');
                //$data['img_url'] = str_replace('public/', 'storage/', $imgUrl);
                $imgUrl = Storage::putFile('public/images/info', $data['img_url']);
                $data['img_url'] = Storage::url($imgUrl);
            } else {
                unset($data['img_url']);
            }

            $info->update($data);
            $message = trans('general.success_update',['object' => trans('info.object')]);
            $status = 'success';
        }
        catch ( \Exception $e ) {
            $message = trans('general.error_update',['object' => trans('info.object')])."\r\n".$e->getMessage();
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
            $message = trans('general.error_destroy',['object' => trans('info.object')])."\r\n".$e->getMessage();
            $status = 'error';
        }

        return redirect()->route('info.index')->with($status, $message);
    }
}
