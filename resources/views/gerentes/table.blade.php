<div class="table-responsive">
    <table class="table" id="gerentes-table">
        <thead>
        <tr>
            <th>Proyecto</th>
            <th>Nombre</th>
            <th>Email</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gerentes as $gerente)
            <tr>
                <td>({{$gerente->no_proyecto}}) / {{ $gerente->ProyectoNombre }}</td>
                <td>{{ $gerente->nombre }}</td>
                <td>{{ $gerente->email }}</td>
                <td>
                    {!! Form::open(['route' => ['gerentes.destroy', $gerente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{{ route('gerentes.show', [$gerente->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('gerentes.edit', [$gerente->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
