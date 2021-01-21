<div class="table-responsive">
    <table class="table" id="tipoDepositos-table">
        <thead>
            <tr>
                <th>Tipo</th>
       <!-- <th>Estatus</th>
        <th>Update At</th> -->
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipoDepositos as $tipoDeposito)
            <tr>
                <td>{{ $tipoDeposito->tipo }}</td>
           <!-- <td>{{ $tipoDeposito->estatus }}</td>
            <td>{{ $tipoDeposito->update_at }}</td> -->                 <td>
                    {!! Form::open(['route' => ['tipoDepositos.destroy', $tipoDeposito->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{{ route('tipoDepositos.show', [$tipoDeposito->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('tipoDepositos.edit', [$tipoDeposito->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
