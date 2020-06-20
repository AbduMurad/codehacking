@extends('layouts.blog-post')

@section('content')

    <div class="col-sm-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForhumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->file}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

                <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group">
                    {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>'3']) !!}
                </div>
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        @foreach($comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" height="64" src="{{$comment->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForhumans()}}</small>
                    </h4>
                    {{$comment->body}}
                    <!-- Nested Comment -->
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="60" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForhumans()}}</small>
                                    </h4>
                                    {{$reply->body}}
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="comment-reply-container">

                        <button class="reply-toggle btn btn-primary pull-right">Reply</button>

                        <div class="comment-reply col-sm-11">
                                {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store']) !!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <div class="form-group">
                                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                        </div>
                    </div>
                <!-- End Nested Comment -->

                </div>
            </div>
        @endforeach


    </div>

@endsection

@section('categories')
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-sm-4">
                <ul class="list-unstyled">
                    <li class="navbar-link">{{$post->category->name}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

@endsection

@section('scripts')
    <script>
        $(".comment-reply-container .reply-toggle").click(function () {
            $(this).next().slideToggle("slow");
        })
    </script>
@endsection