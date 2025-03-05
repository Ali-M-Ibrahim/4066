<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function f1()
    {
        return "Hello i am first controller and i am function 1";
    }

    function f2(){
        return response()
            ->json(["firstname"=>"ali","lastname"=>"ibrahim"]);
    }
    function f3($id){
        return "Hello the id is:" . $id;
    }

    function f4($fname,$lname){
        return response()
            ->json(["firstname"=>$fname,"lastname"=>$lname]);
    }

    function post(Request $request){
        $header = $request->header('secret');
//        if($header=="123"){
//            return "data";
//        }else{
//            return 403;
//        }

        $first_name = $request->firtname;
        $last_name = $request->lastname;
        $age = $request->input('age',20);
        return response()
            ->json(["firstname"=>$first_name,"lastname"=>$last_name,'age'=>$age]);
    }

    function put(Request $request){
        return "i am put";
    }

}
