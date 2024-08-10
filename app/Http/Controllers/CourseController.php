<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use Exception;
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

            $post = Course::create($course);

            if($post){
                //redirect dengan pesan sukses
                return redirect()->route('courses.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('courses.index')->with(['error' => 'Data Gagal Disimpan!']);
            }

        } catch (\Exception $th) {
            return redirect()->route('courses.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $courses = Material::where('course_id', '=', $course['id'])->paginate(5) ;
        return view('courses.show', ['course' => $course ,'courses' => $courses]);
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

            $post = $course->update($newCourse);

            if($post){
                //redirect dengan pesan sukses
                return redirect()->route('courses.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('courses.index')->with(['error' => 'Data Gagal Disimpan!']);
            }

        } catch (\Exception $th) {
            return redirect()->route('courses.index')->with(['error' => 'Data Gagal Disimpan!']);
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
            return redirect()->route('courses.index')->with('message', 'Sukses menghapus');
        } catch (\Throwable $th) {
            return redirect()->route('courses.index')->with('error', 'Gagal menghapus');
        }
    }
}
