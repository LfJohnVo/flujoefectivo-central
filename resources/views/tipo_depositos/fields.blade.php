<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo deposito:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('estatus', 'Activo', ['class' => 'form-control','maxlength' => 8,'maxlength' => 8]) !!}
</div>

<!-- Update At Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('update_at', 'Activo', ['class' => 'form-control','id'=>'update_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#update_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tipoDepositos.index') }}" class="btn btn-default">Cancelar</a>
</div>
