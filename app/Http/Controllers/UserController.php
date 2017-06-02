<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
class UserController extends Controller
{
    //
    public function create(){
        return view('static_pages.create');
    }
    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

}
