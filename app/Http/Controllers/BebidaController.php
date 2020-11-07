<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use Illuminate\Http\Request;

class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bebidas = Bebida::get();
        return view('bebidas/bebidasIndex', compact('bebidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bebidas.bebidaForm');
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
        Bebida::create($request->all());
        
        //Redirecciona
        return redirect('/bebida');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function show(Bebida $bebida)
    {
        //
        return view('bebidas.bebidaShow', compact('bebida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function edit(Bebida $bebida)
    {
        //
        return view('bebidas.bebidaForm', compact('bebida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bebida $bebida)
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

        Bebida::where('id',$bebida->id)->update($request->except('_token','_method'));
        return redirect()->route('bebida.show', [$bebida]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bebida $bebida)
    {
        //
        $bebida->delete();
        return redirect()->route('bebida.index');
    }
}
