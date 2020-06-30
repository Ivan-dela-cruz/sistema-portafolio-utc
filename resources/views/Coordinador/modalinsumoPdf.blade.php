<!DOCTYPE >
<html lang="en">
<head>
    <title>
    </title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    </meta>
    </meta>
</head>
<body>

<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="modalSubirActividad" role="dialog">
        <div class="modal-dialog modal-xs ">
            <div class="modal-content">

                <div class="modal-header text-center">
                    <button class="close" data-dismiss="modal" onclick="limpiarModalActividad()" type="button">
                        ×
                    </button>
                    <h4 class="modal-title">
                        <b>
                            Subir Documentos PDF
                        </b>
                    </h4>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10 text-center" id="notaSubirActividad">

                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10 text-center">
                            <form action="" class="formarchivo" id="frm_subir_insumo_pdf"
                                  method="post">
                                <div class="form-group">
                                    <!-- Id del parametro a subir ao actualizar -->
                                    <input id="id_insumo" name="id_insumo" type="hidden">
                                    <!--  El doque a enviar-->
                                    <input id="_token" name="_token" type="hidden" value="{!! csrf_token(); !!}">
                                    <h4>
                                        <b>
                                            Descripción:
                                        </b>
                                    </h4>
                                    <input class="form-control" id="titulo_pdf" name="titulo_pdf" readonly="" required=""
                                           type="text">
                                </div>

                                <div class="form-group text-center">
                                    <label for="apellido">
                                        Archivo a subir (Formato: PDF)
                                    </label>
                                    <p style="color:orange" class="help-block"> Máximo 5MB
                                        <span
                                                class="fa fa-exclamation-triangle">

                                        </span>
                                    </p>
                                    <input class="form-control" id="url_pdf" name="url_pdf" required="" type="file">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success " type="subtmit">
                                                <span class="glyphicon glyphicon-saved">
                                                    Guardar
                                                </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button" onclick="limpiarModalActividad()">
                        Cerrar
                    </button>


                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    function limpiarModalActividad() {
        //Limpia el mensaje que aparece ala subir pdf
        document.getElementById("notaSubirActividad").innerHTML = "";
        //Limpia el formulario
        $('#frm_subir_insumo_pdf').trigger("reset");

    }

</script>


</body>
</html>