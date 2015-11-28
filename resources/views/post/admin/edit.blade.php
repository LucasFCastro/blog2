@extends('template')
@section('content')

        <h2>Editando Post - {{ $post->title }}</h2>

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach($errors->all() as $error)
                    {{ $error }}<br />
                @endforeach
            </div>
        @endif

        {!! Form::model($post, ['route'=>['admin.posts.update', $post->id], 'method'=>'put']) !!}

            @include('post.admin._form')

            <div class="form-group">
                {!! Form::label('tags', 'Tags:') !!}
                {!! Form::textarea('tags', $post->tagList , ['class' => 'form-control', 'style'=>'height: 50px']) !!}
            </div>

            <!--- Salvar Field --->
            <div class="form-group">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

@endsection