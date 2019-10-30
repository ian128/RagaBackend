<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountModel;
use Validator;

class Account extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AccountModel::get(),200);
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
            'email' => 'required',
            'first_name' => 'required',
            'password' => 'required',
            'phone_number' => 'required'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $data = [
            'first_name' => $request->first_name,
            'email'=> $request->email,
            'last_name' => $request->last_name,
            'password' => md5($request->password),
            'phone_number'=> $request->phone_number,
            'photo_profile'=> $request->photo_profile
        ];
        $account = AccountModel::create($data);
        return response()->json($account,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = AccountModel::find($id);
        if(is_null($account))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        return response()->json($account,200);
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
        $account = AccountModel::find($id);
        if(is_null($account))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $account->update($request->all());
        return response()->json($request->email);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = AccountModel::find($id);
        if(is_null($account))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $account->delete();
        return response()->json(null,204);
    }
}
