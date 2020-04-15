<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        //function pas
//        $user = \App\User::find($id);
//        $posts = $user->posts();

        $posts = DB::select(sprintf('select * from posts where user_id = %d', $id));

        return view('/user.dashboard', ['posts' => $posts]);
    }

}
