<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

//        method 1
//        $greeting = "Hello Class";
//        $message= "This is my message for you from backend";
//        return View(
//            "FirstView",
//            ["greet"=>$greeting,'msg'=>$message]
//        );


//        method 2
//        $greet = "Hello Class";
//        $msg= "This is my message for you from backend";
//        return View(
//            "FirstView",
//            compact("greet","msg")
//        );


//        method 3
         $greeting = "Hello Class";
        $message= "This is my message for you from backend";

        $this->prepareData();
        return View("FirstView")
            ->with("greet",$greeting)
            ->with("msg",$message);
    }


    public function index2(){
        $this->prepareData();
        return View("SecondView");
    }
    function prepareData(){
        $data1 = "Data 1 from prepare data function";
        $data2="Data 2 from prepare data function ";
        \View::share(["data1"=>$data1,"data2"=>$data2]);
    }

    function listCustomers()
    {
        $data = Customer::all();
        return View("ListCustomers")->with("data",$data);
    }

    function viewCustomer($id)
    {
        $data = Customer::find($id);
        return View("ViewCustomer",compact("data"));
    }

    function page1()
    {
        return View("Page1");
    }

    function page2()
    {
        return View("Page2");
    }
}
