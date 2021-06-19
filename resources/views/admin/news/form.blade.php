<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $news->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('description', $news->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Autor') }}
            {{ Form::text('author', $news->author, ['class' => 'form-control' . ($errors->has('author') ? ' is-invalid' : ''), 'placeholder' => 'Autor']) }}
            {!! $errors->first('author', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de publicación') }}
            {{ Form::date('pub_date', $news->pub_date, ['class' => 'form-control' . ($errors->has('pub_date') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de publicación']) }}
            {!! $errors->first('pub_date', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado de publicación') }}
            {{ Form::select(
                'pub_status',
                [
                    '1' => 'Publicado',
                    '0' => 'No publicado'
                    /* ETC.. */
                ],
                ['class' => 'form-control' . ($errors->has('pub_status') ? ' is-invalid' : ''), 'placeholder' => 'Estado de publicación']) }}
            {!! $errors->first('pub_status', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Sección') }}
            {{ Form::text('section', $news->section, ['class' => 'form-control' . ($errors->has('section') ? ' is-invalid' : ''), 'placeholder' => 'Sección']) }}
            {!! $errors->first('section', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar   </button>
    </div>
</div>
