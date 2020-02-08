<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\http\Requests\PostRequest;
use GuzzleHttp\Client;
use Auth;
use Session;
use App\Like;

class PostController extends Controller
{
    public function show(Post $post) {
        return view('posts.detail', compact('post'));

        
    }

    public function store(PostRequest $post_request){
        $post_request->merge(['user_id'	=>	auth()->id()]);
    
        Post::create($post_request->input());
        return	back()->with('message',	['success',	__('Post created succesfully')]);
    }

    public function like($id){
        
        Like::create([
            'post_id' =>$id,
            'user_id' => Auth::id()
        ]);
        $post=Post::find($id);
        $aux=$post->num_likes;
        $post->num_likes=$aux+1;
        $post->save();

        Session::flash('success', 'You liked the post');

        return redirect()->back();
    }

    public function unlike($id){
        
        $like= Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        $post=Post::find($id);
        $aux=$post->num_likes;
        $post->num_likes=$aux-1;
        $post->save();

        Session::flash('success', 'You unliked the post');

        return redirect()->back();
    }
    
}