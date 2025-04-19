<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login');
    }
    
    public function login(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();

        if ($user) {

            $log = Log::where('user_id', '=', $user->id)
                ->whereDate('created_at', '=', now()
                ->toDateString())
                ->first();

            if ($log) {
                $log->attempts += 1;
                $log->save();
            } else {
                $log = new Log();
                $log->user_id = $user->id;
                $log->attempts = 1;
                $log->save();
            }
        }

        if ($user && Hash::check($request->password, $user->password)) {
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->regenerate();
                Session::put(['fullname' => $user->fullname]);
                Session::put(['authorized_page' => $user->authorized_page]);

                $render_message = [
                    'response' => 1,
                    'message' => 'Login success',
                    'path' => '/dashboard'
                ];
            } else {
                $render_message = [
                    'response' => 0,
                    'message' => 'Failed to authenticate!',
                    'path' => '/dashboard'
                ];
            }

            return response()->json($render_message);

        } else {
            $render_message = [
                'response' => 0,
                'message' => 'Invalid User Credentials!',
                'path' => '/dashboard'
            ];

            return response()->json($render_message);
        }
    }

    public function logout(Request $request) 
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}
