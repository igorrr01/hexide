<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 5;
        $users = User::orderByDesc('id')->paginate($perPage);
        
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::select('id', 'name', 'email', 'admin')->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|string|max:255|email|unique:users,email,' . $request->id,
                'admin' => 'required'
            ]
        );
        $data = $request->except('password');
        $user = User::findOrFail($request->id);
        $user->update($data);
        
        return redirect()->back()->with('success', 'User is successfully update');   

    }

    public function destroy(Request $request)
    {
        User::destroy($request->id);
        return redirect()->back()->with('success', 'User is successfully delete');   
    }
}
