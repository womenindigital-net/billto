<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function user(Request $request)
    {
       $user_id =  $request->user()->id;
       $user = User::find($user_id );
       return  $user;
    }


}
