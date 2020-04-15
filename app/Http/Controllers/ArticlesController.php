<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Laravelista\Comments\Commentable;
use App\Post;
use Auth;

class ArticlesController extends Controller
{
    function index()
    {
        $posts = \App\Post::all()->where('post_status', 'PUBLIED');
        return view('articles', ['posts' => $posts]);
    }

    public function show($post_name)
    {
       $post = \App\Post::where('post_name', $post_name)->first();

       return view('posts/single', ['post' => $post]);
    }

    public function create()
    {
      return view('posts.create');
    }

    /**
     * show the for for editing the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     **/
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    public function save(PostRequest $request)
    {
        return $this->update($request, 0);
    }

    public function update(PostRequest $request, $id)
    {
        $message = 'Post updated successfully.';

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'name' => 'required',
            'type' => 'required',
            'category' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        try {

            // update
            if ($id != 0) {
                $post = Post::find($id);

                if (!$post) {
                    return redirect()->back()->with('article_error_message', 'No Post Found');
                }
            } else { // new
                $post = new Post;
            }

            // Handle File Upload
            if($request->hasFile('cover_image')){
                // Get filename with the extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('cover_image')->storeAs('public/image_file', $fileNameToStore);
                // Delete file if exists
                Storage::delete('public/image_file/'.$post->cover_image);
            }

            $post->user_id = Auth::user()->id;
            $post->post_title = $request->input('title');
            $post->post_content = $request->input('content');
            $post->post_status = $request->input('status');
            $post->post_name = $request->input('name');
            $post->post_type = $request->input('type');
            $post->post_category = $request->input('category');

            if($request->hasFile('cover_image')){
                $post->cover_image = '/storage/image_file/' . $fileNameToStore;
            }
            $post->save();

            return redirect('/profile')->with('article_success_message', $message);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return redirect('/profile')->with('article_error_message', $message);

    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $message = 'Post deleted successfully.';

        //Check if post exists before deleting
        if (!isset($post)){
            return redirect()->back()->with('article_error_message', 'No Post Found');
        }

        // Check for correct user
        if(auth()->user()->id != $post->user_id){
            return redirect()->back()->with('article_error_message', 'Unauthorized Page');
        }

        try {

            if($post->cover_image && $post->cover_image != 'noimage.jpg'){
                Storage::delete('public/image_file/'.$post->cover_image);
            }

            $post->delete();

            return redirect()->back()->with('article_success_message', $message);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return redirect()->back()->with('article_error_message', $message);
    }

}
