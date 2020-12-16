<!-- Fecha Deposito Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_deposito', 'Fecha Deposito:') !!}
    {!! Form::text('fecha_deposito', null, ['class' => 'form-control','id'=>'fecha_deposito']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_deposito').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tipo Traslado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_traslado', 'Tipo Traslado:') !!}
    {!! Form::text('tipo_traslado', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Ingreso Dep Central Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_dep_central', 'Ingreso Dep Central:') !!}
    {!! Form::number('ingreso_dep_central', null, ['class' => 'form-control']) !!}
</div>

<!-- Ingreso Dep Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_dep_cliente', 'Ingreso Dep Cliente:') !!}
    {!! Form::number('ingreso_dep_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Venta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_venta', 'Fecha Venta:') !!}
    {!! Form::text('fecha_venta', null, ['class' => 'form-control','id'=>'fecha_venta']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_venta').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Folios Traslado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('folios_traslado', 'Folios Traslado:') !!}
    {!! Form::text('folios_traslado', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Proyecto:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_proyecto">
        @foreach($proyectos as $proyecto)
            <option value="{{$proyecto->id}}">{{$proyecto->no_proyecto}}-{{$proyecto->Nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Gerente:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_gerente">
        @foreach($gerentes as $gerente)
            <option value="{{$gerente->id}}">{{$gerente->id_proyecto}}-{{$gerente->nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Banco:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_bancos">
        @foreach($bancos as $banco)
            <option value="{{$banco->id}}">{{$banco->nombre}}</option>
        @endforeach
    </select>
</div>

<!-- Archivo Pago Field -->
<div class="form-group col-sm-6">
    <div class="input-group-prepend">
        <span class="input-group-text">Subir imagen</span>
    </div>
    <div class="custom-file">
        <input type="file" accept="image/jpeg" name="archivo_pago" class="custom-file-input" id="inputGroupFile01">
        <label class="custom-file-label" for="inputGroupFile01">Elija su archivo</label>
    </div>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('depositos.index') }}" class="btn btn-default">Cancelar</a>
</div>
