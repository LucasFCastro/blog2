@include('editor_tinymce')
    <!--- Título Field --->
        <div class="form-group">
            {!! Form::label('title', 'Título:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <!--- Conteudo Field --->
        <div class="form-group">
            {!! Form::label('content', 'Conteudo:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control editor']) !!}
        </div>