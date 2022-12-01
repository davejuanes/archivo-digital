<html>
<style>
    * {
        font-family: Arial, Helvetica, sans-serif
    }

    table {
        width: 100%
    }

    td {
        border: 1px solid rgb(128, 126, 126)
    }
</style>
<table style="width: 100%">
    <th></th>
    <th>Sistema Contención digital</th>
    <th></th>
</table>

<table>
    <thead>
        <tr>
            <th style="background: rgb(35, 102, 165); color: white">Nombre</th>
            <th style="background: rgb(35, 102, 165); color: white">Número de C.I.</th>
            <th style="background: rgb(35, 102, 165); color: white">Número de Teléfono</th>
            <th style="background: rgb(35, 102, 165); color: white">Email</th>
            <th style="background: rgb(35, 102, 165); color: white">Dirección</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->numero_ci }}</td>
            <td>{{ $cliente->numero_telefono }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->direccion }}</td>
        </tr>
    </tbody>
</table>
<br>
<table>
    <thead>
        <tr>
            <th style="background: rgb(35, 102, 165); color: white">Número</th>
            <th style="background: rgb(35, 102, 165); color: white">Codigo</th>
            <th style="background: rgb(35, 102, 165); color: white">Contenido</th>
            <th style="background: rgb(35, 102, 165); color: white">Fecha inicio</th>
            <th style="background: rgb(35, 102, 165); color: white">Fecha fin</th>
            <th style="background: rgb(35, 102, 165); color: white">Estado</th>
            <th style="background: rgb(35, 102, 165); color: white">Archivos</th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 1;
        @endphp
        @foreach ($documentos as $d)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $d->codigo }}</td>
                <td>{{ $d->contenido }}</td>
                <td>{{ date('d/m/Y', strtotime($d->fecha_inicio)) }}</td>
                <td>{{ date('d/m/Y', strtotime($d->fecha_fin)) }}</td>
                <td>{{ $d->estado }}</td>
                <td>
                    @foreach ($archivos as $a)
                        @if ($a->fk_id_documento === $d->pk_id_documento)
                            "{{ $a->tipo_documento }} <br>
                            {{ $a->codigo_archivador }} <br>
                            {{ $a->ubicacion }}"
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</html>
