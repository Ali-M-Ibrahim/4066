<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniResource;
use App\Models\Uni;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UniApiController extends Controller
{
    use ApiResponse;

    public function index(){
      $data = Uni::all();
      $handledData = UniResource::collection($data);
      return $this->sendResponse("Uni Retrieved Successfully",$handledData);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
           'name'=>"required"
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->sendError("Failure",$errors);
        }

        $obj = new Uni();
        $obj->name = $request->name;
        $obj->save();
        return $this->sendResponse("Uni created Successfully",$obj,Response::HTTP_CREATED);
    }

    public function show($id){
        $obj = Uni::find($id);
        if(!$obj){
            return $this->sendError("Id does not exist",[],Response::HTTP_BAD_REQUEST);
        }
        return $this->sendResponse("Uni retrieved Successfully",new UniResource($obj));

    }

    public function update($id,Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>"required"
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->sendError("Failure",$errors);
        }

        $obj = Uni::find($id);
        if(!$obj){
            return $this->sendError("Id does not exist",[],Response::HTTP_BAD_REQUEST);
        }

        $obj->name = $request->name;
        $obj->save();
        return $this->sendResponse("Uni updated Successfully",$obj);

    }


    public function delete($id){
        $obj = Uni::find($id);
        if(!$obj){
            return $this->sendError("Id does not exist",[],Response::HTTP_BAD_REQUEST);
        }
        $obj->delete();
        return $this->sendResponse("Uni deleted Successfully",[]);
    }
}
