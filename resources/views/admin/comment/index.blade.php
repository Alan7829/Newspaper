@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Comentarios</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-right">
                                <a href="{{ route('comments.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear nuevo comentario') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Autor</th>
                                        <th>Email</th>
                                        <th>Mensaje</th>
                                        <th>Noticia</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $comment->author }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td>{{ $comment->message }}</td>
                                            <td>{{ isset($comment->article->name) ? $comment->article->name : ''}}</td>

                                            <td>
                                                <form action="{{ route('comments.destroy', $comment->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('comments.show', $comment->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('comments.edit', $comment->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $comments->links() !!}
            </div>
        </div>
    </div>
@endsection
