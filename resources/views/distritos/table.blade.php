<div class="table-responsive">
    <table class="table" id="distritos-table">
        <thead>
        <tr>
            <th>Distrito</th>
            <th>Identificador</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($distritos as $distrito)
            <tr>
                <td>{{ $distrito->distrito }}</td>
                <td>{{ $distrito->identificador }}</td>
                <td>
                    {!! Form::open(['route' => ['distritos.destroy', $distrito->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{{ route('distritos.show', [$distrito->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('distritos.edit', [$distrito->id]) }}" class='btn btn-default btn-xs'><i
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
