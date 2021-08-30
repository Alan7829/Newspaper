<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Autor') }}
            {{ Form::text('author', $comment->author, ['class' => 'form-control' . ($errors->has('author') ? ' is-invalid' : ''), 'placeholder' => 'Autor']) }}
            {!! $errors->first('author', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Email') }}
            {{ Form::text('email', $comment->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Mensaje') }}
            {{ Form::text('message', $comment->message, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => 'Mensaje']) }}
            {!! $errors->first('message', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        @if (isset($comment->article))
            <div class="form-group">
                {{ Form::label('Noticia') }}
                {{ Form::select('news_id', $news, $comment->article->id, ['class' => 'custom-select' . ($errors->has('news_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('news_id', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        @else
            <div class="form-group">
                {{ Form::label('Noticia') }}
                {{ Form::select('news_id', $news, ['class' => 'custom-select' . ($errors->has('news_id') ? ' is-invalid' : '')]) }}
                {!! $errors->first('news_id', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        @endif

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
