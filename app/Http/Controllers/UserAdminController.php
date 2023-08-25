<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:user',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required',
            'role' => 'required',
        ], [
            'required' => ':attribute dibutuhkan',
            'unique' => ':attribute sudah terdaftar, coba email yang lain',
            'confirmed' => ':attribute konfirmasi tidak cocok',
            'min' => ':attribute minimal :min karakter'
        ]);

        $user = new User;


        if ($request->hasFile('photo')) {
            $path = $request->photo->path();
 
            $extension = $request->photo->extension();

        
            $filename = str_replace(' ', '_', $request->name) . '_' .date('dmyhis') .'.' .  $extension;
            
            $path = $request->photo->storeAs('avatars', $filename);

            $user->profile_picture = $filename;
        }

        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();

        return redirect('/admin/users')->with('success', ['message' => 'Data user berhasil terdaftar!']);
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
        $user = User::find($id);

        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => ['required', Rule::unique('user')->ignore($request->email, 'email')],
            'password' => 'confirmed',
            'phone' => 'required',
            'role' => 'required',
        ], [
            'required' => ':attribute dibutuhkan',
            'unique' => ':attribute sudah terdaftar, coba email yang lain'
        ]);

        
        dd($request->input(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
