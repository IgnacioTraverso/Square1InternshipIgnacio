<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use	Illuminate\Support\Facades\App;
use	Illuminate\Support\Facades\Storage;
use Auth;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'blog_id','user_id','title','description','publication_date','num_likes'
    ];

    protected	static	function	boot()	{
        parent::boot();
        static::creating(function($post){
            if(	!App::runningInConsole()	)	{
                $post->user_id = auth()->id();
            }
        });
    }

    public function blog(){
        return $this->belongsTo(Blog::class,'blog_id');
    }

    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

    public	function isOwner()	{
        return $this->owner->id === auth()->id();
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function is_liked_by_auth_user(){
        $id=Auth::id();

        $likers = array();

        foreach($this->likes as $like):
            array_push($likers, $like->user_id);
        endforeach;

        if(in_array($id, $likers)){
            return true;
        }else{
            return false;
        }
    }
}
