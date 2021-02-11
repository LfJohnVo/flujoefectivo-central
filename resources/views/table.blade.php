<div class="table-responsive">
    <table class="table" id="proyectos-table">
        <thead>
        <tr>
            <th>Ingreso central</th>
            <th>Ingreso cliente</th>
            <!--<th>Total dia</th>-->
            <th>fecha deposito</th>
        </tr>
        </thead>
        <tbody>
        @foreach($desgloses as $desglose)
            <tr>
                <td>{{ $desglose->ingreso_central }}</td>
                <td>{{ $desglose->ingreso_cliente }}</td>
                <td>
                    @if($desglose->fecha_deposito == 'JANUARY')
                        Enero
                    @elseif($desglose->fecha_deposito == 'FEBRUARY')
                        Febrero
                    @else
                        not found
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
