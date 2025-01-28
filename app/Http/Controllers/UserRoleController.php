<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user_role.index',compact('users'));
    }

    public function table()
    {
        $users = User::all();
        return view('user_role.table',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required|in:Male,Female',
            'status' => 'required|in:Active,Inactive',
        ]);

        try {
            // Create new user
            User::create([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'name_ext' => $request->input('name_ext', ''),
                'gender' => $validated['gender'],
                'status' => $validated['status'],
                'remember_token' => Str::random(10),
            ]);

            return redirect()->route('user_role.index')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error creating user: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user_role.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('user_role.table')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $user = User::find($id);
            $user -> delete();
            return response()->json(['success' => 'User deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting user: ' . $e->getMessage()]);
        }
    }
}
