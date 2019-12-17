<?php

namespace App\Http\Controllers\Sparring;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SparringModel;
use Validator;

class Sparring extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SparringModel::get(),200);
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
            "name"  => 'required',
            "sport_id"  => 'required',
            "court_id"  => 'required',
            "user_id" => 'required',
            "date"  => 'required',
            "price_per_person"  => 'required',
            "start_time"  => 'required',
            "end_time"  => 'required',
            "desc"  => 'required',
            "who_can_play"  => 'required',
            "repeat_every_week"  => 'required'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $sparring = SparringModel::create($request->all());
        return response()->json($sparring,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sparring = SparringModel::find($id);
        if(is_null($sparring))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        return response()->json($sparring,200);
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
        $sparring = SparringModel::find($id);
        if(is_null($sparring))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $sparring->update($request->all());
        return response()->json($sparring,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sparring = SparringModel::find($id);
        if(is_null($sparring))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $sparring->delete();
        return response()->json(null,204);
    }
}
