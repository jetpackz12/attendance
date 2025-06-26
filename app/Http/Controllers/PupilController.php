<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Pupil;
use App\Models\StudentForm;
use App\Models\Teacher;
use Illuminate\Http\Request;

class PupilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $render_data = [
            'pupils' => Pupil::all(),
            'teachers' => Teacher::all()
        ];

        return view('pupil_management.pupil_management', $render_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pupil_image = null;
        // $student_form = null;

        if ($request->hasFile('pupil_image') && $request->file('pupil_image')->isValid()) {
            $pupil_image_name = time() . '.' . $request->pupil_image->extension();
            $request->pupil_image->move(public_path('pupil/pupil_image'), $pupil_image_name);
            $pupil_image = 'pupil/pupil_image/' . $pupil_image_name;
        }
    
        // if ($request->hasFile('student_form') && $request->file('student_form')->isValid()) {
        //     $student_form_name = time() . '_form10.' . $request->student_form->extension();
        //     $request->student_form->move(public_path('pupil/pupil_form10'), $student_form_name);
        //     $student_form = 'pupil/pupil_form10/' . $student_form_name;
        // }

        $pupil = new Pupil();
        $pupil->image = $pupil_image;
        $pupil->first_name = $request->first_name;
        $pupil->middle_name = $request->middle_name;
        $pupil->last_name = $request->last_name;
        $pupil->birth_date = $request->birth_date;
        $pupil->gender = $request->gender;
        $pupil->email_address = $request->email_address;
        $pupil->address = $request->address;
        // $pupil->student_form_10 = $student_form;
        $pupil->grade_level = $request->grade_level;
        $pupil->section = $request->section;
        $pupil->save();

        $student_form = new StudentForm();
        $student_form->pupil_id = $pupil->id;
        $student_form->school = $request->SF10_school;
        $student_form->school_id = $request->SF10_school_id;
        $student_form->district = $request->SF10_district;
        $student_form->division = $request->SF10_division;
        $student_form->region = $request->SF10_region;
        $student_form->school_year = $request->SF10_school_year;
        $student_form->teacher_id = $request->SF10_teacher;
        $student_form->save();

        $grade = new Grade();
        $grade->student_form_id = $student_form->id;
        $grade->mother_tongue_1 = $request->SF10_1_mother_tongue;
        $grade->mother_tongue_2 = $request->SF10_2_mother_tongue;
        $grade->mother_tongue_3 = $request->SF10_3_mother_tongue;
        $grade->mother_tongue_4 = $request->SF10_4_mother_tongue;
        $grade->final_mother_tongue = $request->SF10_final_mother_tongue;
        $grade->remarks_mother_tongue = $request->SF10_remarks_mother_tongue;
        
        $grade->filipino_1 = $request->SF10_1_filipino;
        $grade->filipino_2 = $request->SF10_2_filipino;
        $grade->filipino_3 = $request->SF10_3_filipino;
        $grade->filipino_4 = $request->SF10_4_filipino;
        $grade->final_filipino = $request->SF10_final_filipino;
        $grade->remarks_filipino = $request->SF10_remarks_filipino;
        
        $grade->english_1 = $request->SF10_1_english;
        $grade->english_2 = $request->SF10_2_english;
        $grade->english_3 = $request->SF10_3_english;
        $grade->english_4 = $request->SF10_4_english;
        $grade->final_english = $request->SF10_final_english;
        $grade->remarks_english = $request->SF10_remarks_english;
        
        $grade->mathematics_1 = $request->SF10_1_mathematics;
        $grade->mathematics_2 = $request->SF10_2_mathematics;
        $grade->mathematics_3 = $request->SF10_3_mathematics;
        $grade->mathematics_4 = $request->SF10_4_mathematics;
        $grade->final_mathematics = $request->SF10_final_mathematics;
        $grade->remarks_mathematics = $request->SF10_remarks_mathematics;
        
        $grade->science_1 = $request->SF10_1_science;
        $grade->science_2 = $request->SF10_2_science;
        $grade->science_3 = $request->SF10_3_science;
        $grade->science_4 = $request->SF10_4_science;
        $grade->final_science = $request->SF10_final_science;
        $grade->remarks_science = $request->SF10_remarks_science;
        
        $grade->araling_panlipunan_1 = $request->SF10_1_araling_panlipunan;
        $grade->araling_panlipunan_2 = $request->SF10_2_araling_panlipunan;
        $grade->araling_panlipunan_3 = $request->SF10_3_araling_panlipunan;
        $grade->araling_panlipunan_4 = $request->SF10_4_araling_panlipunan;
        $grade->final_araling_panlipunan = $request->SF10_final_araling_panlipunan;
        $grade->remarks_araling_panlipunan = $request->SF10_remarks_araling_panlipunan;
        
        $grade->epp_tle_1 = $request->SF10_1_epp_tle;
        $grade->epp_tle_2 = $request->SF10_2_epp_tle;
        $grade->epp_tle_3 = $request->SF10_3_epp_tle;
        $grade->epp_tle_4 = $request->SF10_4_epp_tle;
        $grade->final_epp_tle = $request->SF10_final_epp_tle;
        $grade->remarks_epp_tle = $request->SF10_remarks_epp_tle;
        
        $grade->music_1 = $request->SF10_1_music;
        $grade->music_2 = $request->SF10_2_music;
        $grade->music_3 = $request->SF10_3_music;
        $grade->music_4 = $request->SF10_4_music;
        $grade->final_music = $request->SF10_final_music;
        $grade->remarks_music = $request->SF10_remarks_music;
        
        $grade->arts_1 = $request->SF10_1_arts;
        $grade->arts_2 = $request->SF10_2_arts;
        $grade->arts_3 = $request->SF10_3_arts;
        $grade->arts_4 = $request->SF10_4_arts;
        $grade->final_arts = $request->SF10_final_arts;
        $grade->remarks_arts = $request->SF10_remarks_arts;
        
        $grade->physical_education_1 = $request->SF10_1_physical_education;
        $grade->physical_education_2 = $request->SF10_2_physical_education;
        $grade->physical_education_3 = $request->SF10_3_physical_education;
        $grade->physical_education_4 = $request->SF10_4_physical_education;
        $grade->final_physical_education = $request->SF10_final_physical_education;
        $grade->remarks_physical_education = $request->SF10_remarks_physical_education;
        
        $grade->health_1 = $request->SF10_1_health;
        $grade->health_2 = $request->SF10_2_health;
        $grade->health_3 = $request->SF10_3_health;
        $grade->health_4 = $request->SF10_4_health;
        $grade->final_health = $request->SF10_final_health;
        $grade->remarks_health = $request->SF10_remarks_health;
        
        $grade->arabic_language_1 = $request->SF10_1_arabic_language;
        $grade->arabic_language_2 = $request->SF10_2_arabic_language;
        $grade->arabic_language_3 = $request->SF10_3_arabic_language;
        $grade->arabic_language_4 = $request->SF10_4_arabic_language;
        $grade->final_arabic_language = $request->SF10_final_arabic_language;
        $grade->remarks_arabic_language = $request->SF10_remarks_arabic_language;
        
        $grade->islamic_values_education_1 = $request->SF10_1_islamic_values_education;
        $grade->islamic_values_education_2 = $request->SF10_2_islamic_values_education;
        $grade->islamic_values_education_3 = $request->SF10_3_islamic_values_education;
        $grade->islamic_values_education_4 = $request->SF10_4_islamic_values_education;
        $grade->final_islamic_values_education = $request->SF10_final_islamic_values_education;
        $grade->remarks_islamic_values_education = $request->SF10_remarks_islamic_values_education;
        
        $grade->final_general_average = $request->SF10_final_general_average;
        $grade->remarks_general_average = $request->SF10_remarks_general_average;
        $grade->save();

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
        $pupil = Grade::join('student_forms', 'grades.student_form_id', '=', 'student_forms.id')
            ->join('pupils', 'student_forms.pupil_id', '=', 'pupils.id')
            ->select('grades.*', 'student_forms.*', 'pupils.*')
            ->where('pupils.id', $request->id)
            ->first();

        return response()->json($pupil);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pupil_image = null;
        // $student_form = null;

        if ($request->hasFile('pupil_image') && $request->file('pupil_image')->isValid()) {
            $pupil_image_name = time() . '.' . $request->pupil_image->extension();
            $request->pupil_image->move(public_path('pupil/pupil_image'), $pupil_image_name);
            $pupil_image = 'pupil/pupil_image/' . $pupil_image_name;
        }
    
        // if ($request->hasFile('student_form') && $request->file('student_form')->isValid()) {
        //     $student_form_name = time() . '_form10.' . $request->student_form->extension();
        //     $request->student_form->move(public_path('pupil/pupil_form10'), $student_form_name);
        //     $student_form = 'pupil/pupil_form10/' . $student_form_name;
        // }

        $pupil = Pupil::find($request->id);

        if (!empty($pupil_image)) {
            $pupil->image = $pupil_image;
        }

        // if (!empty($student_form)) {
        //     $pupil->student_form_10 = $student_form;
        // }

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

        $student_form = StudentForm::where('pupil_id',$request->id)->first();
        $student_form->school = $request->SF10_school;
        $student_form->school_id = $request->SF10_school_id;
        $student_form->district = $request->SF10_district;
        $student_form->division = $request->SF10_division;
        $student_form->region = $request->SF10_region;
        $student_form->school_year = $request->SF10_school_year;
        $student_form->teacher_id = $request->SF10_teacher;
        $student_form->save();

        $grade = Grade::where('student_form_id',$student_form->id)->first();
        $grade->student_form_id = $student_form->id;
        $grade->mother_tongue_1 = $request->SF10_1_mother_tongue;
        $grade->mother_tongue_2 = $request->SF10_2_mother_tongue;
        $grade->mother_tongue_3 = $request->SF10_3_mother_tongue;
        $grade->mother_tongue_4 = $request->SF10_4_mother_tongue;
        $grade->final_mother_tongue = $request->SF10_final_mother_tongue;
        $grade->remarks_mother_tongue = $request->SF10_remarks_mother_tongue;
        
        $grade->filipino_1 = $request->SF10_1_filipino;
        $grade->filipino_2 = $request->SF10_2_filipino;
        $grade->filipino_3 = $request->SF10_3_filipino;
        $grade->filipino_4 = $request->SF10_4_filipino;
        $grade->final_filipino = $request->SF10_final_filipino;
        $grade->remarks_filipino = $request->SF10_remarks_filipino;
        
        $grade->english_1 = $request->SF10_1_english;
        $grade->english_2 = $request->SF10_2_english;
        $grade->english_3 = $request->SF10_3_english;
        $grade->english_4 = $request->SF10_4_english;
        $grade->final_english = $request->SF10_final_english;
        $grade->remarks_english = $request->SF10_remarks_english;
        
        $grade->mathematics_1 = $request->SF10_1_mathematics;
        $grade->mathematics_2 = $request->SF10_2_mathematics;
        $grade->mathematics_3 = $request->SF10_3_mathematics;
        $grade->mathematics_4 = $request->SF10_4_mathematics;
        $grade->final_mathematics = $request->SF10_final_mathematics;
        $grade->remarks_mathematics = $request->SF10_remarks_mathematics;
        
        $grade->science_1 = $request->SF10_1_science;
        $grade->science_2 = $request->SF10_2_science;
        $grade->science_3 = $request->SF10_3_science;
        $grade->science_4 = $request->SF10_4_science;
        $grade->final_science = $request->SF10_final_science;
        $grade->remarks_science = $request->SF10_remarks_science;
        
        $grade->araling_panlipunan_1 = $request->SF10_1_araling_panlipunan;
        $grade->araling_panlipunan_2 = $request->SF10_2_araling_panlipunan;
        $grade->araling_panlipunan_3 = $request->SF10_3_araling_panlipunan;
        $grade->araling_panlipunan_4 = $request->SF10_4_araling_panlipunan;
        $grade->final_araling_panlipunan = $request->SF10_final_araling_panlipunan;
        $grade->remarks_araling_panlipunan = $request->SF10_remarks_araling_panlipunan;
        
        $grade->epp_tle_1 = $request->SF10_1_epp_tle;
        $grade->epp_tle_2 = $request->SF10_2_epp_tle;
        $grade->epp_tle_3 = $request->SF10_3_epp_tle;
        $grade->epp_tle_4 = $request->SF10_4_epp_tle;
        $grade->final_epp_tle = $request->SF10_final_epp_tle;
        $grade->remarks_epp_tle = $request->SF10_remarks_epp_tle;
        
        $grade->music_1 = $request->SF10_1_music;
        $grade->music_2 = $request->SF10_2_music;
        $grade->music_3 = $request->SF10_3_music;
        $grade->music_4 = $request->SF10_4_music;
        $grade->final_music = $request->SF10_final_music;
        $grade->remarks_music = $request->SF10_remarks_music;
        
        $grade->arts_1 = $request->SF10_1_arts;
        $grade->arts_2 = $request->SF10_2_arts;
        $grade->arts_3 = $request->SF10_3_arts;
        $grade->arts_4 = $request->SF10_4_arts;
        $grade->final_arts = $request->SF10_final_arts;
        $grade->remarks_arts = $request->SF10_remarks_arts;
        
        $grade->physical_education_1 = $request->SF10_1_physical_education;
        $grade->physical_education_2 = $request->SF10_2_physical_education;
        $grade->physical_education_3 = $request->SF10_3_physical_education;
        $grade->physical_education_4 = $request->SF10_4_physical_education;
        $grade->final_physical_education = $request->SF10_final_physical_education;
        $grade->remarks_physical_education = $request->SF10_remarks_physical_education;
        
        $grade->health_1 = $request->SF10_1_health;
        $grade->health_2 = $request->SF10_2_health;
        $grade->health_3 = $request->SF10_3_health;
        $grade->health_4 = $request->SF10_4_health;
        $grade->final_health = $request->SF10_final_health;
        $grade->remarks_health = $request->SF10_remarks_health;
        
        $grade->arabic_language_1 = $request->SF10_1_arabic_language;
        $grade->arabic_language_2 = $request->SF10_2_arabic_language;
        $grade->arabic_language_3 = $request->SF10_3_arabic_language;
        $grade->arabic_language_4 = $request->SF10_4_arabic_language;
        $grade->final_arabic_language = $request->SF10_final_arabic_language;
        $grade->remarks_arabic_language = $request->SF10_remarks_arabic_language;
        
        $grade->islamic_values_education_1 = $request->SF10_1_islamic_values_education;
        $grade->islamic_values_education_2 = $request->SF10_2_islamic_values_education;
        $grade->islamic_values_education_3 = $request->SF10_3_islamic_values_education;
        $grade->islamic_values_education_4 = $request->SF10_4_islamic_values_education;
        $grade->final_islamic_values_education = $request->SF10_final_islamic_values_education;
        $grade->remarks_islamic_values_education = $request->SF10_remarks_islamic_values_education;
        
        $grade->final_general_average = $request->SF10_final_general_average;
        $grade->remarks_general_average = $request->SF10_remarks_general_average;
        $grade->save();

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

    /**
     * Print the specified resource from storage.
     */
    public function print($id)
    {
        $render_data = [
            'pupil' => Grade::join('student_forms', 'grades.student_form_id', '=', 'student_forms.id')
            ->join('pupils', 'student_forms.pupil_id', '=', 'pupils.id')
            ->select('grades.*', 'student_forms.*', 'pupils.*')
            ->where('pupils.id', $id)
            ->first(),
            'teachers' => Teacher::all()
        ];

        return view('pupil_management.pupil_print', $render_data);
    }

    
}
