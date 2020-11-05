<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin/index');
    }

    public function store(Request $request){
       
        $data = $request->validate([
            'name' => 'required|max:45',
            'is_admin' => 'required|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:45'
        ]);

        $user = User::create($data);
        return redirect()->back()->with('success', $user->name . ' saved');

    }
}
