@extends('admin.layouts.template')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $comment->message ?? 'Ver comentario' }}</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        <!-- Content Row -->

        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">Ver comentario</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('comments.index') }}"> Regresar</a>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <strong>Autor:</strong>
                                {{ $comment->author }}
                            </div>
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $comment->email }}
                            </div>
                            <div class="form-group">
                                <strong>Mensaje:</strong>
                                {{ $comment->message }}
                            </div>
                            <div class="form-group">
                                <strong>Noticia:</strong>
                                {{ isset($comment->article->name) ? $comment->article->name : '' }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
