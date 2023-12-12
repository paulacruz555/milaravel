<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiantes;

class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome');
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiantes::findOrFail($id);
        return view('Estudiante.pagDetalle',compact('xDetAlumnos'));
    }
    public function fnRegistrar (Request $request) {

        //return $request;

        $request ->validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'

        ]);

        $nuevoEstudiante = new Estudiantes;

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save();

        return back()->with('msj','Se registro con exito...');


    }
    public function fnLista(){
        $xAlumnos = Estudiantes::all();
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnGaleria($numero=null) {
        $valor = $numero;
        $otro = 25;

        return view('pagGaleria', compact('valor', 'otro'));
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiantes::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'))->with('msj', 'Se actualizó con éxito...');
    }
    

    public function fnUpdate(Request $request, $id){

        $xUpdateAlumnos = Estudiantes::findOrFail($id);

        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> apeEst;
        $xUpdateAlumnos -> fnaEst = $request -> fnaEst;
        $xUpdateAlumnos -> turMat = $request -> turMat;
        $xUpdateAlumnos -> semMat = $request -> semMat;
        $xUpdateAlumnos -> estMat = $request -> estMat;

        $xUpdateAlumnos -> save();

        return back()->with('msj','Se actualizo con éxito...');
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiantes::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj','Se elimino con éxito ...');
    }

    //
}