<div id="divTiempo" class="col-md-12">
    <table class="table table-bordered">
        <thead class="bg-primary">
        <tr>
            <th style="border: #cabecb 1px solid; border-collapse: collapse;"
                scope="col"></th>
            <th style="border: #cabecb 1px solid; border-collapse: collapse;"
                colspan="2" scope="col">Portada del Portafolio
            </th>
            <th style="border: #cabecb 1px solid; border-collapse: collapse;"
                colspan="2" scope="col">Parámetros del portafolio
            </th>
        </tr>
        <tr>
            <th style="border: #cabecb 1px solid; border-collapse: collapse; text-align: center;"
                scope="col">Período
            </th>
            <th style="border: #cabecb 1px solid; border-collapse: collapse;"
                scope="col">fecha
            </th>
            <th style="border: #cabecb 1px solid; border-collapse: collapse;"
                scope="col">hora
            </th>
            <th style="border: #cabecb 1px solid; border-collapse: collapse;"
                scope="col">fecha
            </th>
            <th style="border: #cabecb 1px solid; border-collapse: collapse;"
                scope="col">hora
            </th>
        </tr>
        </thead>
        <tbody>
        @if(count($tiempoTarea))

            @foreach($tiempoTarea as $tiempota)
                <tr class="tiempo{{$tiempota->id}}">
                    <td style="border: #cabecb 1px solid; border-collapse: collapse;">{!! $tiempota->periodo->desde !!}
                        - {!! $tiempota->periodo->hasta !!}</td>
                    <td style="border: #cabecb 1px solid; border-collapse: collapse;">{!! $tiempota->fecha_fin_portada !!}</td>
                    <td style="border: #cabecb 1px solid; border-collapse: collapse;">{!! $tiempota->hora_fin_portada !!}</td>
                    <td style="border: #cabecb 1px solid; border-collapse: collapse;">{!! $tiempota->fecha_fin_materia !!}</td>
                    <td style="border: #cabecb 1px solid; border-collapse: collapse;">{!! $tiempota->hora_fin_materia !!}</td>
                </tr>

            @endforeach
            {{$tiempoTarea->render()}}
        @else
            <!--Si no existe periodo academico registrado-->

            <h4 value="">
                No existe Período Académico Registrado
            </h4>

        @endif
        </tbody>
    </table>

</div><!--Cierre del col-10-->