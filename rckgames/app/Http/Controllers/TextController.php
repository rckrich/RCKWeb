<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        $texts = Text::all();
        return view('texts.index', compact('texts'));
    }

    public function create()
    {
        return view('texts.create');
    }

    public function store(Request $request)
    {
        try{
           $request->validate([
                'textname' => 'required',
                'description' => 'required',
            ]);

            Text::create($request->all()); 
            
            $message = trans('general.success_store',['object' => trans('text.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_store',['object' => trans('text.object')]);
            $status = 'error';
        }
        return redirect()->route('texts.index')->with($status, $message);
    }

    public function show(Text $text)
    {
        return view('texts.show', compact('text'));
    }

    public function edit(Text $text)
    {
        return view('texts.edit', compact('text'));
    }

    public function update(Request $request, Text $text)
    {
        try{
            $request->validate([
                'textname' => 'required',
                'description' => 'required',
            ]);

            $text->update($request->all());
            $message = trans('general.success_update',['object' => trans('text.object')]);
            $status = 'success';
        }
        catch ( \Exception $e ) {
            $message = trans('general.error_update',['object' => trans('text.object')]);
            $status = 'error';
        }
        return redirect()->route('texts.index')->with($status, $message);
    }

    public function destroy(Text $text)
    {
        try{
            $text->delete();
            $message = trans('general.success_destroy',['object' => trans('text.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_destroy',['object' => trans('text.object')]);
            $status = 'error';
        }

        return redirect()->route('texts.index')->with($status, $message);
    }
}
