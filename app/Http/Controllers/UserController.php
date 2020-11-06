<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
       // dd($users);
        return $users;
    }

    public function store(Request $request){
       
        $data = $request->validate([
            'name' => 'required|max:45',
            'is_admin' => 'required|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:45'
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->is_admin = $request->is_admin;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', $user->name . ' saved');

    }

    public function edit($user_id){
        
        $user = User::findOrFail($user_id);
        return view('admin/edit', compact('user'));
    }

    public function update(Request $request, $user_id){

        $request->validate([
            'name' => 'required|max:45',
            'is_admin' => 'required|integer',
        ]);
        
        $user = User::findOrFail($user_id);

        $user->name = $request->name;
        $user->is_admin = $request->is_admin;
        
        if($user->email != $request->email){
            $request->validate([
                'email' => 'required|email|unique:users'
            ]);
            $user->email = $request->email;
        }

        $user->save();
        
        return redirect('/admin')->with('success', $user->name . ' updated successfully');
    }

    public function destroy($user_id){
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect()->back()->with('success', $user->name.' deleted');
    }

}
