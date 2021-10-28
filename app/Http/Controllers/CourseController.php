<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $course = Course::all();
        return response()->json($course);
    }

    public function show($id)
    {
        $course = Course::find($id);
        return response()->json($course);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'coursename' => 'required|string',
            'harga' => 'required|integer',
            'status' => 'required|in:gratis,berbayar',
            'deskripsi' => 'string',
        ]);

        $data = $request->all();
        $course = Course::create($data);

        return response()->json($course);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        // jika data tidak ditemukan
        if (!$course) {
            return response()->json(['message' => 'Course tidak ditemukan'], 404);
        }

        $this->validate($request, [
            'coursename' => 'string',
            'harga' => 'integer',
            'status' => 'in:gratis,berbayar',
            'deskripsi' => 'string',
        ]);

        $data = $request->all();
        $course->fill($data);
        $course->save();
        return response()->json($course);
    }

    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course tidak ditemukan'], 404);
        }

        $course->delete();
        return response()->json(['message' => 'Course berhasil di hapus']);
    }
}
