<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notify;
use Validator;

class HomeController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:notifies']
        ]);

        if(!$validator->fails()){
            if($request->ajax()){

                $notify = new Notify;
                $notify->email = $request['email'];
                $notify->save();
                return response()->json(['email'=>$notify->email]);
            }
        }
        else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
}
