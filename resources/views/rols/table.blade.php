<div class="table-responsive">
    <table class="table" id="rols-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Id Users</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rols as $rol)
            <tr>
                <td>{{ $rol->nombre }}</td>
            <td>{{ $rol->id_users }}</td>
                <td>
                    {!! Form::open(['route' => ['rols.destroy', $rol->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rols.show', [$rol->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('rols.edit', [$rol->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
