<?php

namespace App\Http\Controllers\Sport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SportModel;
use Validator;

class Sport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SportModel::get(),200);
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
        $rules = [
            'name' => 'required|min:2',
            'max_participant' => 'required',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $sports = SportModel::create($request->all());
        return response()->json($sports,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sports = SportModel::find($id);
        if(is_null($sports))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        return response()->json($sports,200);
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
        $sports = SportModel::find($id);
        if(is_null($sports))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $sports->update($request->all());
        return response()->json($sports,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sports = SportModel::find($id);
        if(is_null($sports))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $sports->delete();
        return response()->json(null,204);
    }
}
