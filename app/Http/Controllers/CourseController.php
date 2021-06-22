<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\CreateCoureseRequest;
use App\Http\Requests\Course\UpdateCoureseRequest;
use App\Models\Courses;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Courses::all();
        return view('Courses.index')->with('course',$course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCoureseRequest $request)
    {
        Courses::create([
            'course_name'=>$request->course_name,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);

        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Courses $course)
    {
        return view("Courses.show",compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $course)
    {
        return view('Courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoureseRequest $request, Courses $course)
    {
        $course->update([
            'course_name'=>$request->course_name,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coure = Courses::findorFail($id);
        $coure->delete();
        return redirect()->route('course.index');
    }
}
