<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alimentos = Alimento::get();
        return view('alimentos/alimentosIndex', compact('alimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alimentos.alimentoForm');
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
        $request->validate([
            'nombre'=>['required','string','max:255'],
            'precio'=>['required','string','max:255'],
        ]);
        //Guardar en DB
        /*
        $grabacion= new Grabacion();
        $grabacion->fecha=$request->fecha;
        $grabacion->tema=$request->tema;
        $grabacion->observaciones=$request->observaciones??'';
        $grabacion->enlace=$request->enlace;
        $grabacion->save();
        */
        //$request->merge(['observaciones'=>$request->observaciones ?? '']);
        Alimento::create($request->all());
        
        //Redirecciona
        return redirect('/alimento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function show(Alimento $alimento)
    {
        //
        return view('alimentos.alimentoShow', compact('alimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Alimento $alimento)
    {
        //
        return view('alimentos.alimentoForm', compact('alimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimento $alimento)
    {
        //
        //
        //dd($request->all(), $request->except('_token','_method'));
        /*
        $grabacion->fecha =$request->fecha;
        $grabacion->tema =$request->tema;
        $grabacion->observaciones =$request->observaciones;
        $grabacion->enlace =$request->enlace;
        $grabacion->save();
        */
        $request->validate([
            'nombre'=>['required','string','max:255'],
            'precio'=>['required','string','max:255'],
        ]);

        Bebida::where('id',$alimento->id)->update($request->except('_token','_method'));
        return redirect()->route('alimento.show', [$alimento]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alimento $alimento)
    {
        //
        $alimento->delete();
        return redirect()->route('alimento.index');
    }
}
