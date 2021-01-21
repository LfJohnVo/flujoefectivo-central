<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Clave distrito</label>
    <select class="form-control" id="exampleFormControlSelect1" name="clave_distrito">
        @foreach($distritos as $distrito)
            <option value="{{$distrito->distrito}}">{{$distrito->distrito}}</option>
        @endforeach
    </select>
</div>

<!-- Id Regional Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('id_regional', 'Id Regional:') !!}
    {!! Form::number('id_regional', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Estatus Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('estatus', 'Estatus:') !!}
    {!! Form::text('estatus', null, ['class' => 'form-control','maxlength' => 1,'maxlength' => 1]) !!}
</div>-->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('distritals.index') }}" class="btn btn-default">Cancelar</a>
</div>
