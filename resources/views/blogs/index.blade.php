@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8	col-md-offset-2">
        <h1 class="text-center	text-mute"> {{__("Blogs")}} </h1>
        @forelse($blogs as $blog)
        <div class="panel	panel-default">
            <div class="panel-heading panel-heading-post">
                {{	$blog->name	}} 
                <span	class="pull-right">
                    {{	__("Posts")	}}:	{{	$blog->posts->count()	}}
                </span>
            </div>
            <div class="panel-body">
                {{	$blog->description	}}
            </div>
            <div class="panel-footer">
            <a href="blogs/pd/{{ $blog->id }}" class="btn btn-success "> {{	"Order by publication dates"}} </a>
            <a href="blogs/nl/{{ $blog->id }}" class="btn btn-success pull-right"> {{	"Order by number of likes"}} </a>
            </div>
        </div>
        @empty
        <div class="alert	alert-danger">
            {{	__("Blog not found")	}}
        </div>
        @endforelse
    </div>
</div>
@endsection

