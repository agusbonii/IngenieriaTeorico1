<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function Create(Request $request){

        Post::create([
            'title' => $request -> post('title'),
            'author' => Auth::user() -> username,
            'body' => $request -> post('body')
        ]);
        return redirect()->back();
    }

    public function Edit(Request $request){
        $blog = [
            'title' => $request->post('title'),
            'body' => $request -> post('body')
        ];
        Post::update($blog);
    }

    public function getPost(Post $index){
        $blog = Post::find($index) -> first();
        return view('blog.index', ['blog' => $blog]);
    }

    public function getPosts(){
        $blogs = Post::get();
        return view('blog.home', ['blogs' => $blogs]);
    }

    public function getMyPosts(){
        $username = Auth::user() -> username;
        $blogs = Post::where('author', $username) -> get();
        return view('blog.myposts', ['blogs' => $blogs]);
    }

    public function Delete(Request $request){
        //
    }
}
