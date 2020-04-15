<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = [];
        $posts = \App\Post::orderBy('id','DESC')->paginate(10)->where('post_status', 'PUBLIED');;
        if (!$request->ajax())
        {
            $data = view('home', ['posts' => $posts]);
        } else {
            if (count($posts)) {
                foreach($posts as $item) {
                    $data[] = [
                        'post_title' => $item->post_title,
                        'post_name' => $item->post_name,
                        'cover_image' => $item->cover_image,
                        'post_content' => $item->post_content,
                        'author_name' => $item->author->name,
                        'created_at' => $item->created_at,
                    ];
                }
            }
            $data = json_encode($posts);
        }

       return $data;
    }

    public function profile()
    {
        return view('/profile');
    }

    public function permissionDenied()
    {
        return view('nopermission');
    }

}
