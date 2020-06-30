<?php

namespace App\Http\Controllers;

use App\Insumo;
use App\Periodo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use File;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $selecPeriodo = $request->selecPeriodo;
        $titulo = $request->titulo_buscar;
        if ($selecPeriodo != null) {


            if ($selecPeriodo != '0') {

                if ($titulo != '') {

                    $periodos = Periodo::all();
                    $insumos = Insumo::where('id_periodo', $selecPeriodo)->where('titulo', 'like', '%' . $titulo . '%')->orderBy('created_at', 'ASC')->paginate(8);

                    return view('Coordinador.InsumosIndex', compact('insumos', 'periodos', 'selecPeriodo'));

                    //->where('carrera.id', 'like', '%' . $selecCarrera . '%')
                } else {
                    $periodos = Periodo::all();
                    $insumos = Insumo::where('id_periodo', $selecPeriodo)->orderBy('created_at', 'ASC')->paginate(8);

                    return view('Coordinador.InsumosIndex', compact('insumos', 'periodos', 'selecPeriodo'));
                }
            } else {

                if ($titulo != '') {
                    $periodos = Periodo::all();
                    $insumos = Insumo::where('titulo', 'like', '%' . $titulo . '%')->orderBy('created_at', 'ASC')->paginate(8);
                    $selecPeriodo = "0";

                    return view('Coordinador.InsumosIndex', compact('insumos', 'periodos', 'selecPeriodo'));
                } else {
                    $selecPeriodo = "0";
                    $periodos = Periodo::all();
                    $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
                    return view('Coordinador.InsumosIndex', compact('insumos', 'periodos', 'selecPeriodo'));
                }
            }

        } else {

            if ($titulo != '') {
                $periodos = Periodo::all();
                $insumos = Insumo::where('titulo', 'like', '%' . $titulo . '%')->orderBy('created_at', 'ASC')->paginate(8);
                $selecPeriodo = "0";

                return view('Coordinador.InsumosIndex', compact('insumos', 'periodos', 'selecPeriodo'));
            } else {
                $selecPeriodo = "0";
                $periodos = Periodo::all();
                $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
                return view('Coordinador.InsumosIndex', compact('insumos', 'periodos', 'selecPeriodo'));
            }


        }
    }

    public function insumosDocentes(Request $request)
    {
        $selecPeriodo = $request->selecPeriodo;
        $titulo = $request->titulo_buscar;
        if ($selecPeriodo != null) {
            if ($selecPeriodo != '0') {
                if ($titulo != '') {
                    $periodos = Periodo::all();
                    $insumos = Insumo::where('id_periodo', $selecPeriodo)->where('titulo', 'like', '%' . $titulo . '%')->orderBy('created_at', 'ASC')->paginate(8);

                    return view('Docente.InsumosIndexDocente', compact('insumos', 'periodos', 'selecPeriodo'));

                    //->where('carrera.id', 'like', '%' . $selecCarrera . '%')
                } else {
                    $periodos = Periodo::all();
                    $insumos = Insumo::where('id_periodo', $selecPeriodo)->orderBy('created_at', 'ASC')->paginate(8);

                    return view('Docente.InsumosIndexDocente', compact('insumos', 'periodos', 'selecPeriodo'));
                }
            } else {

                if ($titulo != '') {
                    $hoy = Carbon::now();
                    $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
                    $periodos = Periodo::all();
                    $insumos = Insumo::where('titulo', 'like', '%' . $titulo . '%')->orderBy('created_at', 'ASC')->paginate(8);
                    $selecPeriodo = "0";

                    return view('Docente.InsumosIndexDocente', compact('insumos', 'periodos', 'selecPeriodo'));
                } else {
                    $selecPeriodo = "0";
                    $periodos = Periodo::all();
                    $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
                    return view('Docente.InsumosIndexDocente', compact('insumos', 'periodos', 'selecPeriodo'));
                }
            }

        } else {

            if ($titulo != '') {
                $hoy = Carbon::now();
                $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
                $periodos = Periodo::all();
                $insumos = Insumo::where('titulo', 'like', '%' . $titulo . '%')->orderBy('created_at', 'ASC')->paginate(8);
                $selecPeriodo = "0";

                return view('Coordinador.InsumosCreate', compact('insumos', 'periodos', 'selecPeriodo'));
            } else {
                $selecPeriodo = "0";
                $periodos = Periodo::all();
                $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
                return view('Docente.InsumosIndexDocente', compact('insumos', 'periodos', 'selecPeriodo'));
            }
        }


        //$insumos = Insumo::all();
        //$periodos = Periodo::all();
        //$selecPeriodo = '0';

        // return view('Docente.InsumosIndexDocente', compact('insumos', 'periodos','selecPeriodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $selecPeriodo = $request->selecPeriodo;
        $titulo = $request->titulo_buscar;
        if ($selecPeriodo != null) {
            if ($selecPeriodo != '0') {
                if ($titulo != '') {
                    $hoy = Carbon::now();
                    $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
                    $periodos = Periodo::all();
                    $insumos = Insumo::where('id_periodo', $selecPeriodo)->whereDate('created_at', $fechaHoy)->where('titulo', 'like', '%' . $titulo . '%')->orderBy('created_at', 'ASC')->paginate(8);
                    return view('Coordinador.InsumosCreate', compact('insumos', 'periodos', 'selecPeriodo'));
                    //->where('carrera.id', 'like', '%' . $selecCarrera . '%')
                } else {
                    $hoy = Carbon::now();
                    $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
                    $periodos = Periodo::all();
                    $insumos = Insumo::where('id_periodo', $selecPeriodo)->whereDate('created_at', $fechaHoy)->orderBy('created_at', 'ASC')->paginate(8);
                    return view('Coordinador.InsumosCreate', compact('insumos', 'periodos', 'selecPeriodo'));
                }
            } else {
                $selecPeriodo = '0';
                $periodos = Periodo::all();
                $hoy = Carbon::now();
                $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
                $insumos = Insumo::whereDate('created_at', $fechaHoy)->orderBy('created_at', 'ASC')->paginate(8);
                return view('Coordinador.InsumosCreate', compact('insumos', 'periodos', 'selecPeriodo'));
            }

        } else {
            $selecPeriodo = "0";
            $periodos = Periodo::all();
            $hoy = Carbon::now();
            $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
            $insumos = Insumo::whereDate('created_at', $fechaHoy)->orderBy('created_at', 'ASC')->paginate(8);


            return view('Coordinador.InsumosCreate', compact('insumos', 'periodos', 'selecPeriodo'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|string',
            'id_periodo' => 'required|integer',
            'url_doc' => 'mimes:docx,doc,txt,xps,xml|max:5120',
            'url_xls' => 'mimes:xlsx,xls,csv,xla|max:5120',
            'url_pdf' => 'mimes:pdf|max:5120',
            'descripcion' => 'string'

        ]);


        //RUTAS POR DEFECTO QUE SERAN MODIFICADAS EN EL CASO QUE SE EXISTA UN ARCHIVO CARGADO
        $rutaDoc = '';
        $rutaXls = '';
        $rutaPdf = '';


        $r1 = null;
        $r2 = null;
        $r3 = null;

        //CREA UN NUEVO INSUMO
        $insumo = new Insumo();
        $insumo->titulo = $request->titulo;
        $insumo->id_periodo = $request->id_periodo;
        $insumo->descripcion = $request->descripcion;
        $insumo->save();

        //OBTENEMOS EL NOMBRE QUE LLEVARA LOS ARCHIVOS  EN BASE AL TITULO DEL INSUMO PERO SIN ESPACIOS
        $nombreArchivos = Str::slug($request->titulo, '-');


        if (($request->file('url_doc')) || ($request->file('url_pdf')) || ($request->file('url_xls'))) {
            //VALIDAMOS QUE LOS ARCHIVOS ESTEN CARGADOS
            if ($request->file('url_doc')) {
                $doc = $request->file('url_doc');
                //OBTENEMOS LA EXTENSION DEL ARCHIVO
                $extension_doc = $doc->getClientOriginalExtension();
                //CREAMOS UNA CADENA QUE REPRESENTARA EL NOMBRE DEL ARCHIVO
                $nombre_doc = $nombreArchivos . '.' . $extension_doc;
                //GUARDAMOS LOS ARCHIVOS EN LA RUTA DEL STORAGE
                $r1 = Storage::disk('insumosdoc')->put(utf8_decode($nombre_doc), \File::get($doc));
                //GENERAMOS LA RUTA DEL ARCHIVO
                $rutaDoc = "storage/insumosDocentes/doc/" . $nombre_doc;
            }
            if ($request->file('url_pdf')) {
                $pdf = $request->file('url_pdf');
                $extension_pdf = $pdf->getClientOriginalExtension();
                $nombre_pdf = $nombreArchivos . '.' . $extension_pdf;
                $r2 = Storage::disk('insumospdf')->put(utf8_decode($nombre_pdf), \File::get($pdf));
                $rutaPdf = "storage/insumosDocentes/pdf/" . $nombre_pdf;
            }

            if ($request->file('url_xls')) {
                $xls = $request->file('url_xls');
                $extension_xls = $xls->getClientOriginalExtension();
                $nombre_xls = $nombreArchivos . '.' . $extension_xls;
                $r3 = Storage::disk('insumosxls')->put(utf8_decode($nombre_xls), \File::get($xls));
                $rutaXls = "storage/insumosDocentes/xls/" . $nombre_xls;
            }

            if ($r1 != null || $r2 != null || $r3 != null) {
                //ACTUALIZAMOS LAS RUTAS DE LOS ARCHIVOS ADJUNTADOS
                $insumo->url_doc = $rutaDoc;
                $insumo->url_xls = $rutaXls;
                $insumo->url_pdf = $rutaPdf;
                $insumo->save();


                return redirect()->route('crear-insumos');
            } else {
                return view("mensajes.msj_rechazado")->with("msj", " Error vuelva a intentar :");
            }


        } else {
            return redirect()->route('crear-insumos');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insumo = Insumo::find($id);
        return response()->json($insumo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $insumo = Insumo::find($id);

        $insumo->titulo = $request->titulo;
        $insumo->descripcion = $request->descripcion;
        $insumo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //eliminar pdf
    public function eliminarPdfInsumo($idDocu)
    {
        $insumo = Insumo::find($idDocu);
        $url_pdf = $insumo->url_pdf;
        $rs = File::delete($url_pdf);
        $periodos = Periodo::all();
        $selecPeriodo = '0';

        if ($rs) {
            $insumo->url_pdf = "";
            $insumo->save();
            $hoy = Carbon::now();
            $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
            $insumos = Insumo::whereDate('created_at', $fechaHoy)->get();

            return response()->json([
                'html' => view('Coordinador.tablaInsumosDocentes', compact('insumos', 'selecPeriodo', 'periodos', 'selecPeriodo'))->render()
            ]);

        } else {
            return view("mensajes.msj_rechazado")->with("msj", " Error vuelva a intentar :");
        }
    }


    //Descargar insumos pdf
    public function descargarPdfInsumo($idDocu)
    {
        $insumo = Insumo::find($idDocu);
        $rutaPdf = $insumo->url_pdf;
        return response()->download($rutaPdf, $insumo->titulo . ".pdf");
    }

    //Descargar insumos tipo word
    public function descargarDocInsumo($idDocu)
    {
        $insumo = Insumo::find($idDocu);
        $rutaPdf = $insumo->url_doc;
        return response()->download($rutaPdf, $insumo->titulo . ".doc");
    }

    //Descargar insumos tipo excel
    public function descargarXlsInsumo($idDocu)
    {
        $insumo = Insumo::find($idDocu);
        $rutaPdf = $insumo->url_xls;
        return response()->download($rutaPdf, $insumo->titulo . ".xlsx");
    }

    public function eliminarInsumoPdf($id)
    {
        $documento = Insumo::find($id);
        //Ruta del archivo
        $archivo = $documento->url_pdf;
        //Eliminar archivo;
        $rs = File::delete($archivo);
        $selecPeriodo = '0';

        if ($rs) {
            $documento->url_pdf = "";
            $documento->save();
            $result = '<div class="bg-success"> <p>Insumo actualizado correctamente !!</p> </div>';
            $periodos = Periodo::all();
            $hoy = Carbon::now();
            $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
            $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
            return response()->json([
                'html' => view('Coordinador.tablaInsumosDocentes', compact('insumos', 'fechaHoy', 'periodos', 'selecPeriodo'))->render(),
                'mensaje' => $result
            ]);

        } else {
            return view("mensajes.msj_rechazado")->with("msj", " Error vuelva a intentar :");
        }

    }

    ///METODO PARA ELIMINAR DOCUMENTO INSUMO .DOC
    public function eliminarInsumoDoc($id)
    {
        $documento = Insumo::find($id);
        //Ruta del archivo
        $archivo = $documento->url_doc;
        //Eliminar archivo;
        $rs = File::delete($archivo);
        $selecPeriodo = '0';

        if ($rs) {
            $documento->url_doc = "";
            $documento->save();
            $result = '<div class="bg-success"> <p>Insumo actualizado correctamente !!</p> </div>';
            $periodos = Periodo::all();
            $hoy = Carbon::now();
            $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
            $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
            return response()->json([
                'html' => view('Coordinador.tablaInsumosDocentes', compact('insumos', 'fechaHoy', 'periodos', 'selecPeriodo'))->render(),
                'mensaje' => $result
            ]);

        } else {
            return view("mensajes.msj_rechazado")->with("msj", " Error vuelva a intentar :");
        }
    }

    ///ELIMINAR DOCUMENTO TIPO .XLS
    public function eliminarInsumoXls($id)
    {
        $documento = Insumo::find($id);
        //Ruta del archivo
        $archivo = $documento->url_xls;
        //Eliminar archivo;
        $rs = File::delete($archivo);
        $selecPeriodo = '0';

        if ($rs) {
            $documento->url_xls = "";
            $documento->save();
            $result = '<div class="bg-success"> <p>Insumo actualizado correctamente !!</p> </div>';
            $periodos = Periodo::all();
            $hoy = Carbon::now();
            $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
            $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
            return response()->json([
                'html' => view('Coordinador.tablaInsumosDocentes', compact('insumos', 'fechaHoy', 'periodos', 'selecPeriodo'))->render(),
                'mensaje' => $result
            ]);

        } else {
            return view("mensajes.msj_rechazado")->with("msj", " Error vuelva a intentar :");
        }
    }


    ///SUBIR DOCUMENTO PDF PARA INSUMO
    public function subirPDFinsumo(Request $request)
    {
        $this->validate($request, [
            'url_pdf' => 'mimes:pdf',
        ]);


        $insumo = Insumo::find($request->id_insumo);

        $rutaPdf = "";
        $selecPeriodo = '0';
        //OBTENEMOS EL NOMBRE QUE LLEVARA LOS ARCHIVOS  EN BASE AL TITULO DEL INSUMO PERO SIN ESPACIOS
        $nombreArchivos = Str::slug($insumo->titulo, '-');
        if ($request->file('url_pdf')) {
            $pdf = $request->file('url_pdf');
            $extension_pdf = $pdf->getClientOriginalExtension();
            $nombre_pdf = $nombreArchivos . '.' . $extension_pdf;
            $r2 = Storage::disk('insumospdf')->put(utf8_decode($nombre_pdf), \File::get($pdf));
            $rutaPdf = "storage/insumosDocentes/pdf/" . $nombre_pdf;
        }

        $insumo->url_pdf = $rutaPdf;
        $insumo->save();

        $result = '<div class="bg-success"> <p>Insumo actualizado correctamente !!</p> </div>';
        $periodos = Periodo::all();
        $hoy = Carbon::now();
        $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
        $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
        return response()->json([
            'html' => view('Coordinador.tablaInsumosDocentes', compact('insumos', 'fechaHoy', 'periodos', 'selecPeriodo'))->render(),
            'mensaje' => $result
        ]);


    }

    ///SUBIR DOCUMENTO PDF PARA INSUMO
    public function subirDOCinsumo(Request $request)
    {
        $this->validate($request, [
            'url_doc' => 'mimes:docx,doc,txt,xps,xml|max:5120',
        ]);


        $selecPeriodo = '0';
        $insumo = Insumo::find($request->id_insumo_doc);

        $rutaDoc = "";
        //OBTENEMOS EL NOMBRE QUE LLEVARA LOS ARCHIVOS  EN BASE AL TITULO DEL INSUMO PERO SIN ESPACIOS
        $nombreArchivos = Str::slug($insumo->titulo, '-');
        //VALIDAMOS QUE LOS ARCHIVOS ESTEN CARGADOS
        if ($request->file('url_doc')) {
            $doc = $request->file('url_doc');
            //OBTENEMOS LA EXTENSION DEL ARCHIVO
            $extension_doc = $doc->getClientOriginalExtension();
            //CREAMOS UNA CADENA QUE REPRESENTARA EL NOMBRE DEL ARCHIVO
            $nombre_doc = $nombreArchivos . '.' . $extension_doc;
            //GUARDAMOS LOS ARCHIVOS EN LA RUTA DEL STORAGE
            $r1 = Storage::disk('insumosdoc')->put(utf8_decode($nombre_doc), \File::get($doc));
            //GENERAMOS LA RUTA DEL ARCHIVO
            $rutaDoc = "storage/insumosDocentes/doc/" . $nombre_doc;
        }

        $insumo->url_doc = $rutaDoc;
        $insumo->save();

        $result = '<div class="bg-success"> <p>Insumo actualizado correctamente !!</p> </div>';
        $periodos = Periodo::all();
        $hoy = Carbon::now();
        $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
        $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
        return response()->json([
            'html' => view('Coordinador.tablaInsumosDocentes', compact('insumos', 'fechaHoy', 'periodos', 'selecPeriodo'))->render(),
            'mensaje' => $result
        ]);

    }

    ///SUBIR DOCUMENTO PDF PARA INSUMO
    public function subirXLSinsumo(Request $request)
    {
        $this->validate($request, [
            'url_xls' => 'mimes:xlsx,xls,csv,xla|max:5120',
        ]);


        $insumo = Insumo::find($request->id_insumo_xls);
        $selecPeriodo = '0';
        $rutaXls = "";
        //OBTENEMOS EL NOMBRE QUE LLEVARA LOS ARCHIVOS  EN BASE AL TITULO DEL INSUMO PERO SIN ESPACIOS
        $nombreArchivos = Str::slug($insumo->titulo, '-');
        if ($request->file('url_xls')) {
            $xls = $request->file('url_xls');
            $extension_xls = $xls->getClientOriginalExtension();
            $nombre_xls = $nombreArchivos . '.' . $extension_xls;
            $r3 = Storage::disk('insumosxls')->put(utf8_decode($nombre_xls), \File::get($xls));
            $rutaXls = "storage/insumosDocentes/xls/" . $nombre_xls;
        }

        $insumo->url_xls = $rutaXls;
        $insumo->save();

        $result = '<div class="bg-success"> <p>Insumo actualizado correctamente !!</p> </div>';
        $periodos = Periodo::all();
        $hoy = Carbon::now();
        $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
        $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);
        return response()->json([
            'html' => view('Coordinador.tablaInsumosDocentes', compact('insumos', 'fechaHoy', 'periodos', 'selecPeriodo'))->render(),
            'mensaje' => $result
        ]);


    }


    public function eliminarInsumo($id)
    {
        $documento = Insumo::find($id);
        //Ruta del archivo
        $archivopdf = $documento->url_pdf;
        $archivodoc = $documento->url_doc;
        $archivoxls = $documento->url_xls;
        //Eliminar archivo;
        $rs1 = File::delete($archivopdf);
        $rs2 = File::delete($archivodoc);
        $rs3 = File::delete($archivoxls);

        $selecPeriodo = '0';
        $documento->delete();
        $periodos = Periodo::all();
        $result = '<div class="bg-success"> <p>Insumo actualizado correctamente !!</p> </div>';
        $hoy = Carbon::now();
        $fechaHoy = Carbon::parse($hoy)->format('Y-m-d');
        $insumos = Insumo::orderBy('created_at', 'ASC')->paginate(8);

        return response()->json([
            'html' => view('Coordinador.tablaInsumosDocentes', compact('insumos', 'fechaHoy', 'periodos', 'selecPeriodo'))->render(),
            'mensaje' => $result
        ]);


    }

}
