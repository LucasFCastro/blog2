@extends('template')
@section('content')
    <h1>Home Page</h1>
    <div class="row">
        <div class="col-md-8">
            <h2>Últimos Posts</h2>
        @foreach($posts as $post)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->content }}</p>
                            <hr>
                            <b>tags: </b>
                            @foreach($post->tags as $tag)
                                {{ $tag->name }} -
                            @endforeach
                            <hr>
                             <a href="#" class="btn btn-default" role="button">leia mais...</a></p>
                            <p><b>Comments: </b></p>
                            @foreach($post->comments as $comment)
                                <p>{{ $comment->comment }} <br />
                                    by <i>{{ $comment->autor }}</i> </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row text-center"> <div class="col-md-12">{!! $posts->render() !!} </div></div>
        </div>
        <div class="col-md-4">
            <h2>Tags</h2>

        </div>
    </div>
@endsection