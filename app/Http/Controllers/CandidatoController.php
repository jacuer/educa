<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //esta clase me permite elimnar recursos de storage fotos, archivos


class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['candidatos']=Candidato::paginate(4);
        return view('candidato.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('candidato.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $campos = [
            'NAME'=>'required|string|max:100',
            'ASPIRANTE'=>'required|string|max:100',
            'CANDIDATO_ID'=>'required|string|max:3',
            'FOTO'=>'required|max:10000|mimes:jpeg,png,jpg',

        ];
        $mensaje=[
            'required'=>'El :atributo es requerido',
            'FOTO.required'=>'La foto es requerida',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosCandidato = request()->except('_token');

        if($request->hasFile('FOTO')){

            $datosCandidato['FOTO']=$request->file('FOTO')->store('uploads', 'public');
        }

        Candidato::insert($datosCandidato);
        //return response()->json($datosEmpleado);
        return redirect('candidato')->with('mensaje','Candidato agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $candidatos = Candidato::findOrFail($id);
        return view('candidato.show')->with('candidato',$candidatos);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $candidato = Candidato::findOrFail($id);
        return view('candidato.edit', compact('candidato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'NAME'=>'required|string|max:100',
            'ASPIRANTE'=>'required|string|max:100',
            'CANDIDATO_ID'=>'required|string|max:3',

        ];
        $mensaje=[
            'require'=>'El :atributo es requerido'
        ];
        
        if($request->hasFile('FOTO')){
            $campos = ['FOTO'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['FOTO.required'=>'La foto es requerida'];
        }


        $this->validate($request, $campos, $mensaje);
        
        $datosCandidato = request()->except(['_token','_method']);

        if($request->hasFile('FOTO')){
            
            $candidato = Candidato::findOrFail($id);
            Storage::delete('public/'.$candidato->FOTO);

            $datosCandidato['FOTO']=$request->file('FOTO')->store('uploads', 'public');
        }

        Candidato::where('id','=',$id)->update($datosCandidato);

        $candidato = Candidato::findOrFail($id);
        //return view('empleado.edit', compact('empleado'));
        return redirect('candidato')->with('mensaje','Candidato modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $candidato = Candidato::findOrFail($id);

        if(Storage::delete('public/'.$candidato->FOTO)){
            
            Candidato::destroy($id);
        }

        return redirect('candidato')->with('mensaje','candidato borrado');
        
    }
}
