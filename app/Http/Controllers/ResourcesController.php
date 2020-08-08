<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\Curriculum;
use App\Subject;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $resources = Resource::all();
        // dd($resources);
        return view('admin.resources.index')->with('resources', $resources)->with('curriculums', Curriculum::all())->with('subjects', Subject::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $resources = $request->all();
        // dd($resources);
        $file = $request->file->store('resources');
        $subjects= Resource::create(array(
            'name' => $request->name,
            'subject_id'=>$request->subject_id,
            'curriculum_id'=>$request->curriculum_id,
                'class' => $request->class,
            'file'=>$file

        ));
        return view('admin.resources.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resources = Resource::find($id);
        return view('admin.resources.edit')->with('resources', $resources)->with('curriculums', Curriculum::all())->with('subjects', Subject::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        $data = request()->all();
        $resource->name = $data['name'];
        $resource->subject_id = $data['subject_id'];
        $resource->curriculum_id = $data['curriculum_id'];
        $resource->class = $data['class'];
        // $resource->file = $data['file'];
        $subject->update();
        return redirect()->route('resources.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('resources.index');
    }
}
