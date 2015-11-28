@extends('template')
@section('content')

    <div class="row">
        <div style="height: 10px;"></div>
        <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <strong>Painel Adminstrativo - Blog  </strong>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-default btn-sm">Novo Post</a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Ação
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">
                            {{ $post->id }}
                        </th>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            <a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}">
                                <button type="button" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                                </button>
                            </a>
                            <a href="{{ route('admin.posts.destroy', ['id'=>$post->id]) }}">
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Excluir">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true">
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="text-center">
            {!! $posts->render() !!}
        </div>
    </div>
@endsection