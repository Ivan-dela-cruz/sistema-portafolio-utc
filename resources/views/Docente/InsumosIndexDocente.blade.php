@extends('principal')
@section('title','Insumos Docentes')
@section('content')

    <section class="container-fluid spark-screen" id="contenido_secundario">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header text-center">
                        <legend><label>Insumos Docentes</label></legend>
                    </div><!--cERRAR BOX HEADER-->
                    <div class="box-body">

                        <div class="form-group text-center">
                            <div class="row">
                                <div class="col-md-1"></div>

                                <div class="col-md-11">
                                    <div id="notificacion-delete"></div>
                                    <div id="id-tab-mat">
                                        <div class="col-lg-8">
                                            <form method="GET" action="insumos" role="search">
                                                <div class="input-group">
                                                    <input name="titulo_buscar" class="form-control input-lg" placeholder="Nombre del insumo"
                                                           type="text">
                                                    <span class="input-group-btn">
                                                    <select style="width: 130px;" class="form-control input-lg"
                                                            name="selecPeriodo" id="selecPeriodo">
                                                        <option value="0" >PERIODO</option>
                                                        @foreach($periodos as $periodo)
                                                            <option

                                                                    @if ($periodo->id==$selecPeriodo)
                                                                    selected
                                                                    @endif

                                                                    value="{!! $periodo->id !!}">

                                                                {!! $periodo->desde !!} - {!! $periodo->hasta !!}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                                    <span class="input-group-btn">
                                                    <input class="btn btn-primary btn-lg" value="Buscar" type="submit"/>
                                                </span>
                                                </div>
                                            </form>
                                        </div>
                                        @include('Docente.tablaInsumosDocentes')
                                    </div>

                                </div><!--Cierre del col-10-->
                                <div class="col-md-1"></div>

                            </div><!--Cierer row-->

                        </div><!-- Cierre form graoup-->


                    </div><!--Cierre box body-->


                    <div class="box-footer">
                    </div><!--Cierre box footer-->

                </div><!--Cierre del segundo box primary-->
            </div>
        </div>

    </section>
@endsection