<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pupil;
use App\Models\Teacher;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentYear = Carbon::now()->year;
        $lastYear = Carbon::now()->subYear()->year;

        $months = range(1, 12);

        $pupil_last_year = [];
        $attendance_last_year = [];

        $pupil_current_year = [];
        $attendance_current_year = [];

        foreach ($months as $month) {
            $pupil_last_year[] = Pupil::whereYear('created_at', $lastYear)
                ->whereMonth('created_at', $month)
                ->count();

            $attendance_last_year[] = Attendance::whereYear('date', $lastYear)
                ->whereMonth('date', $month)
                ->count();

            $pupil_current_year[] = Pupil::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $month)
                ->count();

            $attendance_current_year[] = Attendance::whereYear('date', $currentYear)
                ->whereMonth('date', $month)
                ->count();
        }

        $render_data = [
            'active_teacher' => Teacher::where('status', 1)->count(),
            'inactive_teacher' => Teacher::where('status', 0)->count(),
            'pupil' => Pupil::count(),
            'today_attendance' => Attendance::whereDate('date', Carbon::today())->count(),
            'pupil_current_year' => $pupil_current_year,
            'pupil_last_year' => $pupil_last_year,
            'attendance_current_year' => $attendance_current_year,
            'attendance_last_year' => $attendance_last_year,
        ];

        return view('dashboard.dashboard', $render_data);
    }
}
