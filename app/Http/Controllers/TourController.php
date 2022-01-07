<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'nombre'=>'required','string',
            'destino'=>'required','string',
            'descripcion'=>'required','string',
            'costo_1'=>'required','string',
            'costo_2'=>'required','string',
            'costo_3'=>'required','string',
            'costo_4'=>'required','string',
            'dificultad'=>'required','string',
            'incluye'=>'required','string',
            'img_1'=>'required','mimes:jpg,bmp,png,jpeg',
            'img_2'=>'required','mimes:jpg,bmp,png,jpeg',
            'estado'=>'required','string',
        ]);

       // return $request;

        
        $uploadImg_1 = $request->file('img_1')->store('uploads','public'); 
        $uploadImg_2 = $request->file('img_2')->store('uploads','public'); 
        
        $tour = Tour::create([
            'nombre'=>$field['nombre'],
            'destino'=>$field['destino'],
            'descripcion'=>$field['descripcion'],
            'costo_1'=>$field['costo_1'],
            'costo_2'=>$field['costo_2'],
            'costo_3'=>$field['costo_3'],
            'costo_4'=>$field['costo_4'],
            'dificultad'=>$field['dificultad'],
            'incluye'=>$field['incluye'],
            'img_1'=>$uploadImg_1,
            'img_2'=>$uploadImg_2,
            'estado'=>$field['estado'],
        ]);

        return response()->json([
            'status'=>'200',
            'success'=>'true',
            'data'=>$tour,
            'messagge'=>'Tour Agregado Exitosamente'
        ]);
        
        

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
