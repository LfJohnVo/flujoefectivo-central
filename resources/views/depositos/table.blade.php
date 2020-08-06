<div class="table-responsive">
    <table class="table" id="depositos-table">
        <thead>
            <tr>
                <th>Fecha Deposito</th>
        <th>Tipo Traslado</th>
        <th>Ingreso Dep Central</th>
        <th>Ingreso Dep Cliente</th>
        <th>Fecha Venta</th>
        <th>Folios Traslado</th>
        <th>Id Proyecto</th>
        <th>Id Gerente</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($depositos as $deposito)
            <tr>
                <td>{{ $deposito->fecha_deposito }}</td>
            <td>{{ $deposito->tipo_traslado }}</td>
            <td>{{ $deposito->ingreso_dep_central }}</td>
            <td>{{ $deposito->ingreso_dep_cliente }}</td>
            <td>{{ $deposito->fecha_venta }}</td>
            <td>{{ $deposito->folios_traslado }}</td>
            <td>{{ $deposito->id_proyecto }}</td>
            <td>{{ $deposito->id_gerente }}</td>
                <td>
                    {!! Form::open(['route' => ['depositos.destroy', $deposito->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('depositos.show', [$deposito->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('depositos.edit', [$deposito->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>