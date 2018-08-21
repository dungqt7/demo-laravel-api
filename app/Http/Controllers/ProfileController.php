<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Validator;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function addProfile(Request $request) {
      $rule = [
         'fullname' => 'required',
      ];
      $validate = Validator::make($request->all(),$rule);
      if($validate->fails()) {
       return response()->json(['message' => 'error','errors' => $validate->messages()]);
      }else{
         $profile = new profile;
         $profile->fullname = $request->Input('fullname');
         $profile->age = $request->Input('age');
         $profile->photo = $request->Input('photo');
         $profile->save();
         $response = array('response' => 'profile Added!', 'success' => true);
         return response()->json(['message' => 'success','profile' => $profile]);
      }

    }
}
