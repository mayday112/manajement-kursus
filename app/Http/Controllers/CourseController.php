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
        $datas = Course::paginate(10);
        return view('courses.index', ['datas' => $datas]);
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

            $data = $request->all();

            $data['slug'] = Str::slug($data['judul']. '-' . Str::lower(Str::random(5)));

            $post = Course::create($data);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course  $course)
    {
        $datas = Material::where('course_id', '=', $course['id'])->paginate(5) ;
        return view('courses.show', ['course' => $course ,'datas' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit', ['data' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

            $data = $request->all();

            $data['slug'] = Str::slug($data['judul']. '-' . Str::lower(Str::random(5)));

            $post = $course->update($data);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {

        $course->delete();
        return redirect()->route('courses.index')->with('message', 'Success to delete');
    }
}
