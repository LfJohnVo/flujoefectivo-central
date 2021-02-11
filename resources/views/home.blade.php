@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Totales</h1>
        <h1 class="pull-right">
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('table')
            </div>
        </div>
        {!! Form::open(['route' => 'reporte', 'class' => 'form-inline']) !!}
        <div class="form-group mb-3">
            <input type="text" disabled readonly class="form-control-plaintext" id="staticEmail2"
                   value="Seleccione fecha reporte">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            {!! Form::text('Fecha', null, ['class' => 'form-control','id'=>'Fecha_pago', 'required', 'placeholder' => 'Fecha inicio']) !!}
            &nbsp;&nbsp;
            {!! Form::text('Fecha_final', null, ['class' => 'form-control','id'=>'Fecha_final', 'required', 'placeholder' => 'Fecha final']) !!}
        </div>
        {!! Form::submit('Descargar', ['class' => 'form-control btn btn-success']) !!}
        {!! Form::close() !!}


    </div>

    @push('scripts')
        <script type="text/javascript">
            $('#Fecha_pago').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                sideBySide: true
            })
        </script>

        <script type="text/javascript">
            $('#Fecha_final').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                sideBySide: true
            })
        </script>
    @endpush

@endsection
