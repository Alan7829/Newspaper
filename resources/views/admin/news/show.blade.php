@extends('admin.layouts.template')

@section('template_title')
    {{ $news->name ?? 'Show News' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show News</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $news->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $news->description }}
                        </div>
                        <div class="form-group">
                            <strong>Author:</strong>
                            {{ $news->author }}
                        </div>
                        <div class="form-group">
                            <strong>Pub Date:</strong>
                            {{ $news->pub_date }}
                        </div>
                        <div class="form-group">
                            <strong>Pub Status:</strong>
                            {{ $news->pub_status }}
                        </div>
                        <div class="form-group">
                            <strong>Section:</strong>
                            {{ $news->section }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
