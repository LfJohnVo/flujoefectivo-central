<div class="table-responsive">
    <table class="table" id="distritals-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Clave Distrito</th>
        <th>Id Regional</th>
        <th>Estatus</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($distritals as $distrital)
            <tr>
                <td>{{ $distrital->nombre }}</td>
            <td>{{ $distrital->clave_distrito }}</td>
            <td>{{ $distrital->id_regional }}</td>
            <td>{{ $distrital->estatus }}</td>
                <td>
                    {!! Form::open(['route' => ['distritals.destroy', $distrital->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('distritals.show', [$distrital->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('distritals.edit', [$distrital->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
