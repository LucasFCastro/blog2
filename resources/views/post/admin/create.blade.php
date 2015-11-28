@extends('template')
@section('content')

        <h2>Novo Post</h2>

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach($errors->all() as $error)
                    {{ $error }}<br />
                @endforeach
            </div>
        @endif

        {!! Form::open(['route'=>'admin.posts.store']) !!}

            @include('post.admin._form')

            <!--- Tags Field --->
            <div class="form-group">
                {!! Form::label('tags', 'Tags:') !!}
                {!! Form::textarea('tags', null, ['class' => 'form-control', 'style'=>'height: 50px']) !!}
            </div>

            <!--- Salvar Field --->
            <div class="form-group">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

@endsection