@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
    @foreach($posts as $post)
        <div class="panel	panel-default">
            <div class="panel-heading panel-heading-post">
                {{	$post->title	}} 
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
    @endforeach
    </div>
</div>

@endsection

