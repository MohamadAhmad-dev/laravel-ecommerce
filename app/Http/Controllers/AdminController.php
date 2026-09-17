<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    function home(){
        return view('admin.home');
    }

    function allUsers(){
        $users = User::withTrashed()->get();
        return view('users.allUsers',compact('users'));
    }

    function activeUsers(){
        $users = User::all();
        return view('users.activeUsers',compact('users'));
    }

    function deletedUsers(){
        $users = User::onlyTrashed()->get();
        return view('users.deletedUsers',compact('users'));
    }

    function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    function restoreUser($id){
        $user =  User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->back();
    }

    function forceDeleteUser($id){
        $user =  User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->back();
    }

    function toggleUser($id){
        $user =  User::findOrFail($id);
        if($user->role=='user'){
            $user->role='admin';
        }
        else{
            $user->role='user';
        }
        $user->save();
        return redirect()->back();
    }
}
