@extends('pagPlantilla')

@section('titulo')
   <h1 class="display-4"> Pagina de lista </h1>
@endsection

@section('seccion')
   <h3>Detalle estudiante</h3>

   <p> Id:                     {{$xDetAlumnos->id}} </p>
   <p> Codigo:                 {{$xDetAlumnos->codEst}} </p>
   <p> Apellidos y nombres:    {{$xDetAlumnos->apeEst}}, {{$xDetAlumnos->nomEst}} </p>
   <p> Fecha de nacimiento:    {{$xDetAlumnos->fnaEst}} </p>
   <p> Turno:                  {{$xDetAlumnos->turEst}} </p>
   <p> Semestre:               {{$xDetAlumnos->semEst}} </p>
   <p> Estado de matricula:    {{$xDetAlumnos->estEst}} </p>
@endsection