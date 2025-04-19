<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $render_data = [
            'users' => User::all()
        ];

        return view('manage_users.manage_users', $render_data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            $render_message = [
                'response' => 0,
                'message' => 'User email is invalid',
                'path' => '/users'
            ];
    
            return response()->json($render_message);
        }

        $permissions = implode(', ', $request->permission);

        $user = new User();
        $user->fullname = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->authorized_page = $permissions;
        $user->save();

        $render_message = [
            'response' => 1,
            'message' => 'Adding user success',
            'path' => '/users'
        ];

        return response()->json($render_message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $data = User::find($request->id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->old_email != $request->email) {

            $user = User::where('email', '=', $request->email)->first();

            if ($user) {
                $render_message = [
                    'response' => 0,
                    'message' => 'User email is invalid',
                    'path' => '/users'
                ];
        
                return response()->json($render_message);
            }

        }

        $permissions = implode(', ', $request->permission);

        $user = User::find($request->id);
        $user->fullname = $request->full_name;
        $user->email = $request->email;
        $user->authorized_page = $permissions;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $render_message = [
            'response' => 1,
            'message' => 'Updating user success',
            'path' => '/users'
        ];

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        $render_message = [
            'response' => 1,
            'message' => 'Deleting user success',
            'path' => '/users'
        ];

        return response()->json($render_message);
    }
}
