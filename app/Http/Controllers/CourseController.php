<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Str;
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
        $courses = Course::paginate(10);
        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'judul' => ['required', 'max:50'],
                'deskripsi' => ['required', 'max:500'],
                'durasi' => ['required', 'integer']
            ]);

            $course = $request->all();
            $course['slug'] = Str::slug($course['judul']. '-' . Str::lower(Str::random(5)));
            Course::create($course);

            return redirect()->route('courses.index');
        } catch (\Exception $th) {
            return redirect()->route('courses.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course
     * @return \Illuminate\Http\Response
     */
    public function show(Course  $course)
    {
        $materials = Material::where('course_id', '=', $course['id'])->paginate(5) ;
        return view('courses.show', ['course' => $course ,'materials' => $materials]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        try {
            $this->validate($request, [
                'judul' => ['required', 'max:50'],
                'deskripsi' => ['required', 'max:500'],
                'durasi' => ['required', 'integer']
            ]);

            $newCourse = $request->all();
            $newCourse['slug'] = Str::slug($newCourse['judul']. '-' . Str::lower(Str::random(5)));
            $course->update($newCourse);


            return redirect()->route('courses.index');
        } catch (\Exception $th) {
            return redirect()->route('courses.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();
            return redirect()->route('courses.index');
        } catch (\Throwable $th) {
            return redirect()->route('courses.index');
        }
    }
}
