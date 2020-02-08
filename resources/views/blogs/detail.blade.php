@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8	col-md-offset-2">
        <h1 class="text-center text-muted">
            {{ __(":name 's recent posts", ['name' => $blog->name]) }}
        </h1>
        <a href="/" class="btn btn-info pull-right">
            {{ __("Back to blogs list") }}
        </a>
        <h5>Order by: </h5>
        <div >
            <a href="../pd/{{ $blog->id }}" class="btn btn-success "> {{	"Publication dates"}} </a>
            <a href="../nl/{{ $blog->id }}" class="btn btn-success "> {{	"Number of likes"}} </a>
            </div>
        <div class="clearfix"></div>
        @forelse($posts as $post)
        <div class="panel	panel-default">
            <div class="panel-heading panel-heading-post">
                <a href="../../posts/{{	$post->id	}}"> {{	$post->title	}} </a>
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
                <span class="pull-right">
                    {{	__("Likes")	}}: {{$post->likes->count()}}
             </span>
            </div>
        </div>
        @empty
        <div class="alert alert-danger">
            {{	__("Posts not found")	}}
        </div>
        @endforelse
        @if($posts->count())
        {{	$posts->links()	}}
        @endif

        @if($blog->id==1)
            @Logged()
            <h3 class="text-muted">
                {{ __("Add a new post in :name", ['name' => $blog->name])}}
            </h3>
            @include('partials.errors')
            <form method="POST" action="../posts" enctype="multipart/form-data">
                {{	csrf_field()	}}
                <input type="hidden" name="blog_id" value="{{	$blog->id	}}" />
                <div class="form-group">
                    <label for="title" class="col-md-12	control-label">{{	__("Title")	}}</label>
                    <input id="title" class="form-control" name="title" value="{{	old('title')	}}" />
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-12	 control-label">{{	 __("Description")	}}</label>
                    <textarea id="description" class="form-control" name="description">{{	old('description')	}}</textarea>
                </div>

                <button type="submit" name="addPost" class="btn	 btn-default">{{__("Add post")	}}</button>
            </form>

            @else
            @include('partials.login_link', ['message' => __("Log in to create a new post")])
            @endLogged
        @endif
    </div>
</div>
@endsection