<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountModel;
use Validator;

class AccountController extends Controller
{
    public function account()
    {
        return response()->json(AccountModel::get(),200);
    }

    public function accountByID($id)
    {
        $account = AccountModel::find($id);
        if(is_null($account))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        return response()->json($account,200);
    }

    public function accountSave(Request $request)
    {
        $rules = [
            'name' => 'required|min:2',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'phone_number' => 'required'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $account = AccountModel::create($request->all());
        return response()->json($account,201);
    }

    public function accountUpdate(Request $request, $id)
    {
        $account = AccountModel::find($id);
        if(is_null($account))
        {
            return response()->json(["message"=>'Request not Found'],404);
        }
        $account->update($request->all());
        return response()->json($account,200);
    }

    public function accountDelete(Request $request, $id)
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
