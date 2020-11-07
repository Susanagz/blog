<?php

namespace App\Http\Controllers;

use App\Models\Grabacion;
use Illuminate\Http\Request;

class GrabacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$grabaciones = DB::table('grabaciones')->get();
        //dd($grabaciones);
        $grabaciones = Grabacion::get();
        return view('grabaciones/grabacionesIndex', compact('grabaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('grabaciones.grabacionForm');
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
        //Recibe datos
        //dd($request->all());
        //Valida
        $request->validate([
            'fecha'=>'required|date',
            'tema'=>['required','string','max:255'],
            'enlace'=>'required|url',
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
        $request->merge(['observaciones'=>$request->observaciones ?? '']);
        Grabacion::create($request->all());
        
        //Redirecciona
        return redirect('/grabacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grabacion  $grabacion
     * @return \Illuminate\Http\Response
     */
    public function show(Grabacion $grabacion)
    {
        //
        return view('grabaciones.grabacionShow', compact('grabacion'));
        //return view('grabacion.grabacionShow')=>with(['grabacion'=>$grabacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grabacion  $grabacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Grabacion $grabacion)
    {
        //
        return view('grabaciones.grabacionForm', compact('grabacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grabacion  $grabacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grabacion $grabacion)
    {
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
            'fecha'=>'required|date',
            'tema'=>['required','string','max:255'],
            'enlace'=>'required|url',
        ]);

        Grabacion::where('id',$grabacion->id)->update($request->except('_token','_method'));
        return redirect()->route('grabacion.show', [$grabacion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grabacion  $grabacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grabacion $grabacion)
    {
        //
        $grabacion->delete();
        return redirect()->route('grabacion.index');
    }
}
