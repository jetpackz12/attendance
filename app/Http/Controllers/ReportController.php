<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $render_data = [
            'logs' => Log::join('users', 'users.id', '=', 'logs.user_id')
                ->select('*', 'logs.created_at AS log_created_at')->get()
        ];

        return view('reports.reports', $render_data);
    }
    
}
