<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heroe;
use Validator;


class HeroeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = Heroe::all();

        return response()->json([
            "success" => true,
            "message" => "Heroe List",
            "data" => $heroes
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
            'identity' => 'required',
            'power' => 'required',
            'editorial_id' => 'required'
        ]);

        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
        }

        $heroes = Heroe::create($input);
        return response()->json([
            "success" => true,
            "message" => "Heroe created successfully.",
            "data" => $heroes
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
        $heroes = Heroe::find($id);
        if (is_null($heroes)) {
        return $this->sendError('Heroe not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Heroe retrieved successfully.",
            "data" => $heroes
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
            'identity' => 'required',
            'power' => 'required',
            'editorial_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $heroes = Heroe::find($id);
        $heroes->name = $request->name;
        $heroes->identity = $request->identity;
        $heroes->power = $request->power;
        $heroes->editorial_id = $request->editorial_id;
        $heroes->updated_at = date('Y-m-d H:i:s');
        $heroes->save();

        return response()->json([
            "success" => true,
            "message" => "Heroe updated successfully.",
            "data" => $heroes
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
        $heroes = Heroe::find($id);
        $heroes->delete();
        return response()->json([
        "success" => true,
        "message" => "Heroe deleted successfully.",
        "data" => $heroes
        ]);
    }
}
