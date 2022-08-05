<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage; //esta clase me permite elimnar recursos de storage fotos, archivos

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['alumnos']=Alumno::paginate(4);
        return view('alumno.index',$datos);

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'PASS_TOKEN'=>'required|string|max:10',
            'VOTO_ALUMNO'=>'required|integer|max:2'
        ];

        $mensaje =[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

       // $datosAlumno = request()->all()->except('_token');
        $datosAlumno = request()->except('_token'); 
        Alumno::insert($datosAlumno);
        /* return response()->json($datosAlumno); */
        /* return redirect('alumno')->with('mensaje','Alumno '.$datosAlumno['PASS_TOKEN'].' agregado con éxito'); */
        return redirect('alumno')->with('mensaje','Alumno agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alumno = Alumno::findOrFail($id);

        return view('alumno.edit', compact('alumno') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosAlumno = $request->except(['_token','_method']);
        Alumno::where('id','=',$id)->update($datosAlumno);
        
        $alumno = Alumno::findOrFail($id);
        //return view('alumno.edit', compact('alumno') ); 
        return redirect('alumno')->with('mensaje','Alumno editado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Alumno::destroy($id);
        return redirect('alumno')->with('mensaje','Alumno borrado');
    }
}
