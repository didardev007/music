<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')
            ->get();


        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateUser($request);

        User::create($validatedData);

        return redirect()->route('admin.user.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validateUser($request, $id);

        $user = User::findOrFail($id);

        $user->update($validatedData);

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
    }

    private function validateUser(Request $request, $userId = null)
    {
        $uniqueEmailRule = 'unique:users,email';
        $uniqueUsernameRule = 'unique:users,username';

        if ($userId) {
            $uniqueEmailRule .= ',' . $userId;
            $uniqueUsernameRule .= ',' . $userId;
        }

        return $request->validate([
            'name' => 'required|string|max:255|',
            'email' => 'required|email|max:255|' . $uniqueEmailRule,
            'password' => 'nullable|min:6',
            'is_admin' => 'nullable|boolean',
            'username' => 'required|string|max:255|' . $uniqueUsernameRule,
        ]);
    }

}
