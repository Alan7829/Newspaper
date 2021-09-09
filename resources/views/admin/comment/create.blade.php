@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Nuevo comentario</h1>
        </div>
        <!-- Content Row -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Crear comentario</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('comments.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf

                                @include('admin.comment.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
