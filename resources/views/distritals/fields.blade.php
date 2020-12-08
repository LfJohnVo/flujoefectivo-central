<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Clave Distrito Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clave_distrito', 'Clave Distrito:') !!}
    {!! Form::text('clave_distrito', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Id Regional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_regional', 'Id Regional:') !!}
    {!! Form::number('id_regional', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus', 'Estatus:') !!}
    {!! Form::text('estatus', null, ['class' => 'form-control','maxlength' => 1,'maxlength' => 1]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('distritals.index') }}" class="btn btn-default">Cancel</a>
</div>
