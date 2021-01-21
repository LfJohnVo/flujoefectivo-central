<div class="table-responsive">
    <table class="table" id="proyectos-table">
        <thead>
        <tr>
            <th>Ingreso central</th>
            <th>Ingreso cliente</th>
            <th>Total dia</th>
            <th>fecha deposito</th>
        </tr>
        </thead>
        <tbody>
        @foreach($desgloses as $desglose)
            <tr>
                <td>{{ $desglose->ingreso_central }}</td>
                <td>{{ $desglose->ingreso_cliente }}</td>
                <td>{{ $desglose->total_dia }}</td>
                <td>{{ $desglose->fecha_deposito }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
