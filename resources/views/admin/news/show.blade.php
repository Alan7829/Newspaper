@extends('admin.layouts.template')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $news->name ?? 'Ver Noticia' }}</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        <!-- Content Row -->

        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">Ver Noticia</span>
                            </div>
                            <div class="float-right">
                                @include('admin.news.comments-modal', [
                                    'article' => $news
                                ]);
                                <a class="btn btn-primary" href="{{ route('news.index') }}"> Regresar</a>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $news->name }}
                            </div>
                            <div class="form-group">
                                <strong>Categoría:</strong>
                                {{ isset($news->category->name) ? $news->category->name : '' }}
                            </div>
                            <div class="form-group">
                                <strong>Descripcion:</strong>
                                {{ $news->description }}
                            </div>
                            <div class="form-group">
                                <strong>Autor:</strong>
                                {{ $news->author }}
                            </div>
                            <div class="form-group">
                                <strong>Fecha de publicación:</strong>
                                {{ $news->pub_date }}
                            </div>
                            <div class="form-group">
                                <strong>Estado de publicación:</strong>
                                {{ $news->pub_status ? 'Publicado' : 'No publicado' }}
                            </div>
                            <div class="form-group">
                                <strong>Seccion:</strong>
                                {{ $news->section }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
