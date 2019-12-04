@extends('principal')
@section('title','Insumos Docentes')
@section('content')

    <section class="container-fluid spark-screen" id="contenido_secundario">

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-1"></div>
                <div class="col-md-12">


                    <div class="box box-primary">
                        <div class="box-header text-center">
                            <legend>

                                <label>INSUMOS PARA LOS DOCENTES</label>
                                <a href="{{url('crear-insumos')}}" class="btn btn-primary pull-right">Agregar nuevo insumo
                                    <i CLASS="fa fa-file"></i>
                                </a>
                            </legend>

                        </div><!--cERRAR BOX HEADER-->
                        <div class="box-body">
                            <div id="id-tab-mat">

                                @include('Coordinador.tablaInsumosDocentes')

                            </div><!--Cierre del col-10-->


                        </div><!-- Cierre form graoup-->


                    </div><!--Cierre box body-->

                </div>
                <div class="box-footer">
                </div><!--Cierre box footer-->

            </div><!--Cierre del segundo box primary-->
        </div>
        </div>

    </section>
@endsection

@include('Coordinador.modalinsumoPdf')
@include('Coordinador.modalinsumoDoc')
@include('Coordinador.modalinsumoXls')