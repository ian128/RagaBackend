<?php

namespace App\Http\Controllers\SparringParticipant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SparringParticipantModel;
use Validator;

class SparringParticipant extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SparringParticipantModel::get(),200);
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
            "user_id"  => 'required',
            "sparring_id" => 'required'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $SparringParticipant = SparringParticipantModel::create($request->all());
        return response()->json($SparringParticipant,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SparringParticipant = SparringParticipantModel::find($id);
        if(is_null($SparringParticipant))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        return response()->json($SparringParticipant,200);
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
        $SparringParticipant = SparringParticipantModel::find($id);
        if(is_null($SparringParticipant))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $SparringParticipant->update($request->all());
        return response()->json($SparringParticipant,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SparringParticipant = SparringParticipantModel::find($id);
        if(is_null($SparringParticipant))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $SparringParticipant->delete();
        return response()->json(null,204);
    }
}
