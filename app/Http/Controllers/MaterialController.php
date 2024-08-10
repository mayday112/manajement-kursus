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
        //
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
            //code...
            $this->validate($request, [
                'judul' => ['required', 'max:50'],
                'deskripsi' => ['required', 'max:500'],
                'link' => ['required'],
                'course_id' => ['required']
            ]);

            $data = $request->all();

            $data['slug'] = Str::slug($data['judul']. '-' . Str::lower(Str::random(5)));

            $post = Material::create($data);

            if($post){
                //redirect dengan pesan sukses
                return redirect()->route('materials.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('materials.index')->with(['error' => 'Data Gagal Disimpan!']);
            }

        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route('materials.index')->with(['error' => 'Data Gagal Disimpan!']);
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
            //code...
            $this->validate($request, [
                'judul' => ['required', 'max:50'],
                'deskripsi' => ['required', 'max:500'],
                'link' => ['required'],
                'course_id' => ['required']
            ]);

            $data = $request->all();

            $data['slug'] = Str::slug($data['judul']. '-' . Str::lower(Str::random(5)));

            $post = $material->update($data);

            if($post){
                //redirect dengan pesan sukses
                return redirect()->route('materials.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('materials.index')->with(['error' => 'Data Gagal Disimpan!']);
            }

        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route('materials.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $material->delete();
        // $delete = $material->delete();

        return redirect()->route('materials.index');
    }
}
