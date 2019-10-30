<?php

namespace App\Http\Controllers\Court;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourtModel;
use Validator;

class Court extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CourtModel::get(),200);
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
            "name" => 'required',
            "user_id" => 'required',
            "sport_id" => 'required',
            "email" => 'required',
            "photo"=> 'required',
            "weekday_price"=> 'required',
            "weekend_price"=> 'required',
            "location"=> 'required',
            "phone_number"=> 'required'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $court = CourtModel::create($request->all());
        return response()->json($court,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $court = CourtModel::find($id);
        if(is_null($court))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        return response()->json($court,200);
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
        $court = CourtModel::find($id);
        if(is_null($court))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $court->update($request->all());
        return response()->json($court,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $court = CourtModel::find($id);
        if(is_null($court))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $court->delete();
        return response()->json(null,204);
    }
}
