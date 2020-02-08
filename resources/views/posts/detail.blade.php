@extends('layouts.app')

@section('content')

<div class="row">

    <div class="container">
    <div>
        <a href="" class="btn btn-info pull-right">
            {{ __("Back to blogs list") }}
            </a>
        </div>
        </br>
        </br>
        <div class="panel	panel-default">
        
            <div class="panel-heading panel-heading-post">
                {{	$post->title	}} 
                <span class="pull-right">
                    {{	__("Owner")	}}: {{	$post->owner->name	}}
                </span>
            </div>
            <div class="panel-body">
                {{	$post->description	}}
            </div>
            <div class="panel-footer">
            <?php
               echo substr(($post->publication_date),  0,  10) 
             ?>
                &nbsp &nbsp
                @Logged()
                @if($post->is_liked_by_auth_user())
                    <a href="../../../posts/unlike/{{	$post->id	}}" class="btn btn-danger">Unlike <span class="badge">{{$post->likes->count()}}</span></a>
                @else
                    <a href="../../../posts/like/{{	$post->id	}}" class="btn btn-success">Like <span class="badge">{{$post->likes->count()}}</span></a>
                @endif
                
                @else
                @include('partials.login_link', ['message' => __("Log in to rate this post")])
            @endLogged
            </div>
            

        </div>
    </div>
</div>

@endsection
