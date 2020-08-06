<!-- No Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_proyecto', 'No Proyecto:') !!}
    {!! Form::number('no_proyecto', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required']) !!}
</div>

<div class="form-group col-sm-6">
    <label for="sel1">Distrito:</label>
    <select class="form-control" id="sel1" name="id_distrito">
        <option value="">Seleccione una opcion</option>
        @foreach($regiones as $region)
            <option value="{!! $region->id !!}">{!! $region->identificador !!}/{!! $region->distrito !!}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('proyectos.index') }}" class="btn btn-default">Cancelar</a>
</div>
