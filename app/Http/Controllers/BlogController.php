<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Auth;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index',compact('blogs'));
    }

    public function userPosts(){
        $idu=Auth::id();
        $posts=Post::where('user_id','=',$idu)->orderBy('publication_date', 'desc')->paginate(5);
        return view('userpost.index', compact('posts'));
    }

    public function show(Blog $blog){
        $posts = $blog->posts()->orderBy('publication_date', 'desc')->paginate(5);
        return view('blogs.detail', compact('blog','posts'));
    }
    public function showorderbylikes(Blog $blog){
        $posts = $blog->posts()->orderBy('num_likes', 'desc')->paginate(5);
        return view('blogs.detail', compact('blog','posts'));
    }
}
