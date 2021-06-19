@extends('admin.layouts.template')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Editar noticia</h1>
        </div>
        <!-- Content Row -->
        <section class="content container-fluid">
            <div class="">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Editar noticia</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('news.update', $news->id) }}" role="form"
                                enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf

                                @include('admin.news.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
