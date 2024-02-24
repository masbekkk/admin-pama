<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function getUsers()
    {
        $data = User::where('role', '!=', 'admin')->get();
        return response()->json(['data' => $data], 200);
    }

    /**
     * Display a listing of the resource to view.
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Display a admin data of the resource to view.
     */
    public function showAdminProfile()
    {
        return view('admin.user.admin', ['user' => User::where("role", 'admin')->first()]);
    }

    /**
     * Update the admin resource in storage.
     */
    public function updateAdminProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ] + ($request->filled('password') ? ['password' => ['string', 'min:8', 'confirmed']] : []));

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::findOrFail(Auth::user()->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ] + ($request->filled('password') ? ['password' => Hash::make($request->password)] : []));

        return response()->json(['message' => 'Admin Profile Updated Successfully!', 200]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // dd($request->role);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return response()->json(['message' => 'Employee Account Created Successfully!', 200]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', 'string'],
        ] + ($request->filled('password') ? ['password' => ['string', 'min:8', 'confirmed']] : []));

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // dd($request->role);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ] + ($request->filled('password') ? ['password' => Hash::make($request->password)] : []));

        return response()->json(['message' => 'Employee Account Updated Successfully!', 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Employee Account Deleted Successfully!', 200]);
    }
}
