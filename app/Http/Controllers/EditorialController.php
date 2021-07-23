<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editorial;
use Validator;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editorials = Editorial::all();

        return response()->json([
            "success" => true,
            "message" => "Editorial List",
            "data" => $editorials
        ]);
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'fundador' => 'required',
            'fecha_fundacion' => 'required'
        ]);

        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
        }

        $editorials = Editorial::create($input);
        return response()->json([
            "success" => true,
            "message" => "Editorial created successfully.",
            "data" => $editorials
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editorials = Editorial::find($id);
        if (is_null($editorials)) {
        return $this->sendError('Heroe not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Editorial retrieved successfully.",
            "data" => $editorials
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'fundador' => 'required',
            'fecha_fundacion' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $editorials = Editorial::find($id);
        $editorials->name = $request->name;
        $editorials->fundador = $request->fundador;
        $editorials->fecha_fundacion = $request->fecha_fundacion;
        $editorials->updated_at = date('Y-m-d H:i:s');
        $editorials->save();

        return response()->json([
            "success" => true,
            "message" => "Heroe updated successfully.",
            "data" => $editorials
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editorials = Editorial::find($id);
        $editorials->delete();
        return response()->json([
        "success" => true,
        "message" => "Editorial deleted successfully.",
        "data" => $editorials
        ]);
    }
}
