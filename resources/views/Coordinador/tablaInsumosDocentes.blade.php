<div class="form-group text-center">
    <div class="row">
        <div class="col-md-11">
            <div id="notificacion-delete"></div>


            <div class="col-lg-8">
                <form method="GET" action="index-insumos" role="search">
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



            <div class="id-tab">
                @if (count($insumos))
                    @foreach($insumos as $insumo)
                        <div class="col-lg-12 text-left">
                            <h3>
                                {{$insumo->titulo}}
                               {{----
                                <span>
                                     <a hidden title="Editar título del insumo" data-id-insumo="{{$insumo->id}}"
                                        class="btn btn-box-tool btn-edit-insumo"
                                        href="#"><i class="fa fa-edit"></i></a>
                                        </span>
                                 --}}
                                <span>
                                    <a title="Eliminar documento"
                                       data-id-insumo="{{$insumo->id}}"
                                       class="btn btn-box-tool btn-insumo-delete"
                                       href="#">
                                            <i class="fa fa-trash"></i>
                                    </a>
                                </span>
                            </h3>
                            <p>
                                Publicado el
                                {{ $insumo->created_at->formatLocalized('%A %d %B %Y')}}
                                por el Administrador [ actualizado el,
                                {{$insumo->updated_at->formatLocalized('%A %d %B %Y')}} ]

                            </p>
                            <p>{{$insumo->descripcion}}</p>
                            <p>Archivos adjuntos:</p>
                        </div>
                        @if ($insumo->url_pdf!='')
                            <div class="col-lg-4 text-left">
                            <span>
                                <img height="35" width="35" src="{{asset('imagenes/pdf2.png')}}" alt="">
                                <a href="">{{substr($insumo->url_pdf,28)}}</a>
                            </span>
                                <p>
                                <span>
                                    <a title="Eliminar documento"
                                       data-id-insumo="{{$insumo->id}}"
                                       class="btn btn-danger btn-insumo-delete-pdf"
                                       href="#">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </span>
                                    <span>
                                    <a title="Descargar documento" class="btn btn-primary"
                                       href="{{url('descarga-insumo-pdf/'.$insumo->id)}}">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </span>
                                </p>
                            </div>
                        @else
                            <div class="col-lg-4 text-left">
                                            <span>
                                                <img height="35" width="35" src="{{asset('imagenes/pdf2.png')}}" alt="">
                                            </span>
                                <p>
                                                <span>
                                                     <button title="Subir documento" class="btn btn-primary"
                                                             data-target="#modalSubirActividad"
                                                             data-toggle="modal"
                                                             onclick="getIdPdf('{{$insumo->id}}', '{{$insumo->titulo}}')"
                                                             type="button">
                                                                <i class="fa fa-upload"></i>
                                                        </button>
                                                </span>
                                </p>

                            </div>
                        @endif
                        @if ($insumo->url_doc!='')
                            <div class="col-lg-4 text-left">
                            <span>
                                <img height="35" width="35" src="{{asset('imagenes/doc.png')}}" alt="">
                                <a href="">{{substr($insumo->url_doc,28)}}</a>
                            </span>
                                <p>
                                <span>
                                    <a title="Eliminar documento"
                                       data-id-insumo="{{$insumo->id}}"
                                       class="btn btn-danger btn-insumo-delete-doc"
                                       href="#">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </span>
                                    <span>
                                    <a title="Descargar documento" class="btn btn-primary"
                                       href="{{url('descarga-insumo-doc/'.$insumo->id)}}">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </span>
                                </p>
                            </div>
                        @else
                            <div class="col-lg-4 text-left">
                            <span>
                                <img height="35" width="35" src="{{asset('imagenes/doc.png')}}" alt="">
                            </span>
                                <p>
                                <span>
                                    <button title="Subir documento" class="btn btn-primary"
                                                             data-target="#modalSubirDoc"
                                                             data-toggle="modal"
                                                             onclick="getIdDoc('{{$insumo->id}}', '{{$insumo->titulo}}')"
                                                             type="button">
                                                                <i class="fa fa-upload"></i>
                                    </button>
                                </span>
                                </p>

                            </div>
                        @endif
                        @if ($insumo->url_xls!='')
                            <div class="col-lg-4 text-left">
                    <span>
                        <img height="35" width="35" src="{{asset('imagenes/xls.png')}}" alt="">
                        <a href="">{{substr($insumo->url_xls,28)}}</a>
                    </span>
                                <p>
                        <span>
                           <a title="Eliminar documento"
                              data-id-insumo="{{$insumo->id}}"
                              class="btn btn-danger btn-insumo-delete-xls"
                              href="#">
                                <i class="fa fa-trash"></i>
                            </a>
                        </span>
                                    <span>
                           <a title="Descargar documento" class="btn btn-primary"
                              href="{{url('descarga-insumo-xls/'.$insumo->id)}}">
                                <i class="fa fa-download"></i>
                            </a>
                        </span>
                                </p>
                            </div>
                        @else
                            <div class="col-lg-4 text-left">
                            <span>
                                <img height="35" width="35" src="{{asset('imagenes/xls.png')}}" alt="">
                            </span>
                                        <p>
                                <span>
                                     <button title="Subir documento" class="btn btn-primary"
                                             data-target="#modalSubirXls"
                                             data-toggle="modal"
                                             onclick="getIdXls('{{$insumo->id}}', '{{$insumo->titulo}}')"
                                             type="button">
                                                                <i class="fa fa-upload"></i>
                                    </button>
                                </span>
                                        </p>

                                    </div>
                        @endif
                        <div class="col-lg-12 text-left">
                            <hr class="bg-danger">
                        </div>
                    @endforeach

                @else
                    <div class="col-lg-12 text-left">
                        <!--Si no existe periodo academico registrado-->
                        <h4 value="">
                            No existe Insumos registrados
                        </h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{$insumos->render()}}
    <p>Total encontrados {{count($insumos)}}</p>
    <div class="col-md-1"></div>
</div>