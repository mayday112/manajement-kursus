<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Material::orderBy('course_id', 'asc')->paginate(10);
        return view('materials.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('materials.create', ['courses' => $courses]);
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
                'link' => ['required'],
                'course_id' => ['required']
            ]);

            $data = $request->all();
            $data['slug'] = Str::slug($data['judul']. '-' . Str::lower(Str::random(5)));
            Material::create($data);

            return redirect()->route('materials.index');
        } catch (\Exception $e) {
            return redirect()->route('materials.index');
        }

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
    public function edit(Material $material)
    {
        $courses = Course::all();
        return view('materials.edit', ['material' => $material, 'courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        try {
            $this->validate($request, [
                'judul' => ['required', 'max:50'],
                'deskripsi' => ['required', 'max:500'],
                'link' => ['required'],
                'course_id' => ['required']
            ]);

            $data = $request->all();
            $data['slug'] = Str::slug($data['judul']. '-' . Str::lower(Str::random(5)));
            $material->update($data);

            return redirect()->route('materials.index');
        } catch (\Exception $e) {
            return redirect()->route('materials.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        try {
            $material->delete();
            return redirect()->route('materials.index');
        } catch (\Throwable $th) {
            return redirect()->route('materials.index');
        }
    }
}
