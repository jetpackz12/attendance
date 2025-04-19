<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $render_data = [
            'teachers' => Teacher::all()
        ];

        return view('teacher_management.teacher_management', $render_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher_image = null;

        if ($request->hasFile('teacher_image') && $request->file('teacher_image')->isValid()) {
            $teacher_image_name = time() . '.' . $request->teacher_image->extension();
            $request->teacher_image->move(public_path('teacher_image'), $teacher_image_name);
            $teacher_image = 'teacher_image/' . $teacher_image_name;
        }

        $teacher = new Teacher();
        $teacher->image = $teacher_image;
        $teacher->first_name = $request->first_name;
        $teacher->middle_name = $request->middle_name;
        $teacher->last_name = $request->last_name;
        $teacher->birth_date = $request->birth_date;
        $teacher->gender = $request->gender;
        $teacher->email_address = $request->email_address;
        $teacher->address = $request->address;
        $teacher->grade_level = $request->grade_level;
        $teacher->section = $request->section;
        $teacher->save();

        $render_message = [
            'response' => 1,
            'message' => 'Adding teacher success',
            'path' => '/teacher_management'
        ];

        return response()->json($render_message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $teacher = Teacher::find($request->id);

        return response()->json($teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $teacher_image = null;

        if ($request->hasFile('teacher_image') && $request->file('teacher_image')->isValid()) {
            $teacher_image_name = time() . '.' . $request->teacher_image->extension();
            $request->teacher_image->move(public_path('teacher_image'), $teacher_image_name);
            $teacher_image = 'teacher_image/' . $teacher_image_name;
        }

        $teacher = Teacher::find($request->id);

        if (!empty($teacher_image)) {
            $teacher->image = $teacher_image;
        }

        $teacher->first_name = $request->first_name;
        $teacher->middle_name = $request->middle_name;
        $teacher->last_name = $request->last_name;
        $teacher->birth_date = $request->birth_date;
        $teacher->gender = $request->gender;
        $teacher->email_address = $request->email_address;
        $teacher->address = $request->address;
        $teacher->grade_level = $request->grade_level;
        $teacher->section = $request->section;
        $teacher->save();

        $render_message = [
            'response' => 1,
            'message' => 'Updating teacher success',
            'path' => '/teacher_management'
        ];

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $pupil = Teacher::find($request->id);
        $pupil->status = $request->status == 1 ? 0 : 1;
        $pupil->save();

        $renderMessage = [
            'response' => 1,
            'message' => 'Updating teacher status success',
            'path' => '/teacher_management'
        ];

        return response()->json($renderMessage);
    }
}
