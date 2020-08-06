<!-- No Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_proyecto', 'No Proyecto:') !!}
    {!! Form::number('no_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Id Distrito Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_distrito', 'Id Distrito:') !!}
    {!! Form::number('id_distrito', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('proyectos.index') }}" class="btn btn-default">Cancel</a>
</div>
