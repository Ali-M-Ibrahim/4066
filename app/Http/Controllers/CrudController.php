<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function createm1(){
        $obj = new Customer();
        $obj->name="Customer 1";
        $obj->address="Address 1";
        $obj->save();
        return "Customer created successfully using method 1";
    }
    public function createm2(Request $request){
        $headerValue = $request->header("secret");
        Customer::create([
            "name"=>"Customer 2",
            "address"=>"Address2 "
        ]);
        return $headerValue;
    }
    public function createm3(Request $request){
        $name = $request->name;
        $address= $request->input("address","Lebanon");

        Customer::create([
            "name"=>$name,
            "address"=>$address
        ]);

            $obj = new Customer();
            $obj->name=$name;
            $obj->address=$address;
            $obj->save();

        return "Customer created successfully using method 2";
    }
    public function createm4(Request $request){
        Customer::create($request->all());
        return "Customer created successfully using method 3";
    }
    public function updatem1(){
        // I want to update customer having id = 2
        //select * from customers where id-2
        $obj = Customer::find(2);
        $obj->name= "Updated Customer";
        $obj->address="Updated Address";
        $obj->save();
        return "Customer updated successfully using method 1";

    }
    public function updatem2(Request $request,$id){

        // method 1
//        $obj = Customer::find($id);
//        $obj->name = $request->name;
//        $obj->address = $request->address;
//        $obj->save();

        //method 2
        $obj2=Customer::find($id);
        $obj2->fill($request->all());
        if($obj2->isClean()){
            return "no change done at the level of the model";
        }
        $obj2->save();
        return "Customer updated successfully using method 1";
    }
    public function massUpdate(){
        //update customer set ...... where name like "%Customer%"
        Customer::where("name","like","%Customer%")
            ->update(["name"=>"Updated","address"=>"Updated"]);
        return "update done";
    }

    public function delete($id){
        $customer = Customer::find($id);
        $customer->delete();
        return "deleted";
    }


    public function massDelete(){
        Customer::where("name","Updated")->delete();
        return "deleted";
    }


}
