<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $render_data = [
            'attendances' => Attendance::where('status', '=', 1)->get()
        ];

        return view('upload_attendance.upload_attendance', $render_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $attendance = Attendance::find($request->id);

        return response()->json($attendance);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $attendance = Attendance::find($request->id);
        
        if (!empty($request->time_in_1)) {
            $attendance->time_in_1 = DateTime::createFromFormat('H:i', $request->time_in_1)->format('h:i:s A');
        }
        if (!empty($request->time_out_1)) {
            $attendance->time_out_1 = DateTime::createFromFormat('H:i', $request->time_out_1)->format('h:i:s A');
        }
        if (!empty($request->time_in_2)) {
            $attendance->time_in_2 = DateTime::createFromFormat('H:i', $request->time_in_2)->format('h:i:s A');
        }
        if (!empty($request->time_out_2)) {
            $attendance->time_out_2 = DateTime::createFromFormat('H:i', $request->time_out_2)->format('h:i:s A');
        }

        $lateMinutes = 0;

        if (!empty($request->time_in_1)) {
            $timeIn1 = Carbon::createFromFormat('H:i', $request->time_in_1);
            $expectedTime1 = Carbon::createFromTime(8, 0, 0);
    
            if ($timeIn1->greaterThan($expectedTime1)) {
                $lateMinutes += $timeIn1->diffInMinutes($expectedTime1);
            }
        }
    
        if (!empty($request->time_in_2)) {
            $timeIn2 = Carbon::createFromFormat('H:i', $request->time_in_2);
            $expectedTime2 = Carbon::createFromTime(13, 0, 0);
    
            if ($timeIn2->greaterThan($expectedTime2)) {
                $lateMinutes += $timeIn2->diffInMinutes($expectedTime2);
            }
        }
    
        $attendance->late_time = abs($lateMinutes);
        $attendance->save();

        $render_message = [
            'response' => 1,
            'message' => 'Updating attendance success',
            'path' => '/upload_attendance'
        ];

        return response()->json($render_message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function save(Request $request)
    {
        $attendance = Attendance::where('status', '=', 1);

        if ($attendance->count() > 0) {
            $attendance->update([
                'status' => 0
            ]);
        } else {
            $render_message = [
                'response' => 0,
                'message' => 'Updating attendances failed. Please upload the attendances first!',
                'path' => '/upload_attendance'
            ];

            return response()->json($render_message);
        }

        $render_message = [
            'response' => 1,
            'message' => 'Updating attendances success',
            'path' => '/upload_attendance'
        ];

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $attendance = Attendance::find($request->id);
        $attendance->delete();

        $render_message = [
            'response' => 1,
            'message' => 'Deleting attendance success',
            'path' => '/upload_attendance'
        ];

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyAll(Request $request)
    {
        $attendance = Attendance::where('status', '=', 1);

        if ($attendance->count() > 0) {
            $attendance->delete();
        } else {
            $render_message = [
                'response' => 0,
                'message' => 'Deleting attendances failed. Please upload the attendances first!',
                'path' => '/upload_attendance'
            ];

            return response()->json($render_message);
        }

        $render_message = [
            'response' => 1,
            'message' => 'Deleting all attendance success',
            'path' => '/upload_attendance'
        ];

        return response()->json($render_message);
    }
         
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        // Validate incoming request data
        $request->validate([
            'file' => 'required|max:2048',
        ]);
  
        Excel::import(new AttendanceImport, $request->file('file'));
                 
        return back()->with('success', 'Upload attendance successfully.');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function indexAttendanceTracker()
    {
        $render_data = [
            'attendance_names' => Attendance::where('status', '=', 0)->select('name')->distinct()->get()
        ];

        return view('attendance_tracker.attendance_tracker', $render_data);
    }

    /**
     * Display the specified resource.
     */
    public function showAttendanceTracker(Request $request)
    {
        $dateRange = explode(' - ', $request->date_range);
        $startDate = Carbon::createFromFormat('m/d/Y', trim($dateRange[0]))->format('Y-m-d');
        $endDate = Carbon::createFromFormat('m/d/Y', trim($dateRange[1]))->format('Y-m-d');
    
        $attendance = Attendance::where('name', '=', $request->name)
            ->whereBetween('date', [$startDate, $endDate])
            ->get();
    
        return response()->json($attendance);
    }
}
