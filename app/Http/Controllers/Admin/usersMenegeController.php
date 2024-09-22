<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class usersMenegeController extends Controller
{
    public function index(){
        $users = User::paginate(5);
        return view('pages.dashboard.users-page', compact('users'));
    }
    public function create(){
        return view('pages.dashboard.user-create');
    }
    public function store(){
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        
        $user = User::findOrFail($id);

        Return view('pages.dashboard.users-edit', compact('user'));
    }
    public function update(Request $request){
        
        $id = $request->id;
        // dd($id);
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|unique:email,' . $id,
        // ]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route(route: 'user.index')->with('success', 'User updated successfully');
    }
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User delete successfully.');
    }
}
