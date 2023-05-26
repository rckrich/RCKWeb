<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwType;

class SwTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $swTypes = SwType::all();
        return view('sw_types.index', compact('swTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sw_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string',
            ]);

            SwType::create($request->all());
            $message = trans('general.success_store',['object' => trans('swtype.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_store',['object' => trans('swtype.object')]);
            $status = 'error';
        }
        return redirect()->route('sw_types.index')->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SwType  $swType
     * @return \Illuminate\Http\Response
     */
    public function show(SwType $swType)
    {
        return view('sw_types.show', compact('swType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SwType  $swType
     * @return \Illuminate\Http\Response
     */
    public function edit(SwType $swType)
    {
        return view('sw_types.edit', compact('swType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SwType  $swType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SwType $swType)
    {
        try{
            $request->validate([
                'name' => 'required|string',
            ]);

            $swType->update($request->all());
            $message = trans('general.success_update',['object' => trans('swtype.object')]);
            $status = 'success';
        }
        catch ( \Exception $e ) {
            $message = trans('general.error_update',['object' => trans('swtype.object')]);
            $status = 'error';
        }
        return redirect()->route('sw_types.index')->with($status, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SwType  $swType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SwType $swType)
    {
        try{
            $swType->delete();
            $message = trans('general.success_destroy',['object' => trans('swtype.object')]);
            $status = 'success';
        } catch ( \Exception $e ) {
            $message = trans('general.error_destroy',['object' => trans('swtype.object')]);
            $status = 'error';
        }

        return redirect()->route('sw_types.index')->with($status, $message);
    }
}