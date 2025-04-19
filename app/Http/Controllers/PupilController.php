<?php

namespace App\Http\Controllers;

use App\Models\Pupil;
use Illuminate\Http\Request;

class PupilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $render_data = [
            'pupils' => Pupil::all()
        ];

        return view('pupil_management.pupil_management', $render_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pupil_image = null;
        $student_form = null;

        if ($request->hasFile('pupil_image') && $request->file('pupil_image')->isValid()) {
            $pupil_image_name = time() . '.' . $request->pupil_image->extension();
            $request->pupil_image->move(public_path('pupil/pupil_image'), $pupil_image_name);
            $pupil_image = 'pupil/pupil_image/' . $pupil_image_name;
        }
    
        if ($request->hasFile('student_form') && $request->file('student_form')->isValid()) {
            $student_form_name = time() . '_form10.' . $request->student_form->extension();
            $request->student_form->move(public_path('pupil/pupil_form10'), $student_form_name);
            $student_form = 'pupil/pupil_form10/' . $student_form_name;
        }

        $pupil = new Pupil();
        $pupil->image = $pupil_image;
        $pupil->first_name = $request->first_name;
        $pupil->middle_name = $request->middle_name;
        $pupil->last_name = $request->last_name;
        $pupil->birth_date = $request->birth_date;
        $pupil->gender = $request->gender;
        $pupil->email_address = $request->email_address;
        $pupil->address = $request->address;
        $pupil->student_form_10 = $student_form;
        $pupil->grade_level = $request->grade_level;
        $pupil->section = $request->section;
        $pupil->save();

        $render_message = [
            'response' => 1,
            'message' => 'Adding pupil success',
            'path' => '/pupil_management'
        ];

        return response()->json($render_message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $pupil = Pupil::find($request->id);

        return response()->json($pupil);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pupil_image = null;
        $student_form = null;

        if ($request->hasFile('pupil_image') && $request->file('pupil_image')->isValid()) {
            $pupil_image_name = time() . '.' . $request->pupil_image->extension();
            $request->pupil_image->move(public_path('pupil/pupil_image'), $pupil_image_name);
            $pupil_image = 'pupil/pupil_image/' . $pupil_image_name;
        }
    
        if ($request->hasFile('student_form') && $request->file('student_form')->isValid()) {
            $student_form_name = time() . '_form10.' . $request->student_form->extension();
            $request->student_form->move(public_path('pupil/pupil_form10'), $student_form_name);
            $student_form = 'pupil/pupil_form10/' . $student_form_name;
        }

        $pupil = Pupil::find($request->id);

        if (!empty($pupil_image)) {
            $pupil->image = $pupil_image;
        }

        if (!empty($student_form)) {
            $pupil->student_form_10 = $student_form;
        }

        $pupil->first_name = $request->first_name;
        $pupil->middle_name = $request->middle_name;
        $pupil->last_name = $request->last_name;
        $pupil->birth_date = $request->birth_date;
        $pupil->gender = $request->gender;
        $pupil->email_address = $request->email_address;
        $pupil->address = $request->address;
        $pupil->grade_level = $request->grade_level;
        $pupil->section = $request->section;
        $pupil->save();

        $render_message = [
            'response' => 1,
            'message' => 'Updating pupil success',
            'path' => '/pupil_management'
        ];

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $pupil = Pupil::find($request->id);
        $pupil->status = $request->status == 1 ? 0 : 1;
        $pupil->save();

        $renderMessage = [
            'response' => 1,
            'message' => 'Updating pupil status success',
            'path' => '/pupil_management'
        ];

        return response()->json($renderMessage);
    }
}
