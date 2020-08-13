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

<!-- Id Proyecto Field -->
<div class="form-group col-sm-6">
    <label for="sel1">Proyectos:</label>
    <select class="form-control" id="sel1" name="id_proyecto">
        <option value="">Seleccione una opcion</option>
        @foreach($proyectos as $proyecto)
            <option value="{!! $proyecto->id !!}">{!! $proyecto->nombre !!}</option>
        @endforeach
    </select>
</div>

<!-- Id Gerente Field -->
<div class="form-group col-sm-6">
    <label for="sel2">Gerente:</label>
    <select class="form-control" id="sel2" name="id_gerente">
        <option value="">Seleccione una opcion</option>
        @foreach($gerentes as $gerente)
            <option value="{!! $gerente->id !!}">{!! $gerente->nombre !!}</option>
        @endforeach
    </select>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('depositos.index') }}" class="btn btn-default">Cancelar</a>
</div>
