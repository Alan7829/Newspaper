<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $category->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            @if (isset($category->parent_category))
                {{ Form::label('Categoría padre') }}
                {{ Form::select('parent_id', $parent_categories, $category->parent_category->id, ['class' => 'custom-select' . ($errors->has('parent_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoría padre']) }}
                {!! $errors->first('parent_id', '<div class="invalid-feedback">:message</p>') !!}
            @else
                {{ Form::label('Categoría padre') }}
                {{ Form::select('parent_id', $parent_categories, ['class' => 'custom-select' . ($errors->has('parent_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoría padre']) }}
                {!! $errors->first('parent_id', '<div class="invalid-feedback">:message</p>') !!}
            @endif
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
