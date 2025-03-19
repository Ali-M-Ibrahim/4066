<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Credential;
use App\Models\Customer;
use App\Models\CustomerService;
use App\Models\Service;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function create(){
        $customer = new Customer();
        $customer->name = "Ali Ibrahim";
        $customer->address = "Baabda";
        $customer->save();

        $credential = new Credential();
        $credential->email = "Ali.ibrahim@ua.edu.lb";
        $credential->password = "123";
        $credential->customer_id= $customer->id;
        $credential->save();

        return response()->json(["message"=>"Data Created"]);
    }
    public function getCustomerById($id){
        //select * from customer where id =?
        $customer = Customer::find($id);
        $relatedCredentials = $customer->getCredential;
        $relatedAccounts = $customer->getAccounts;
        $relatedServices = $customer->getServices;
        return $customer;
    }
    public function getCredentialsById($id){
        //select * from credentials where id=?
        $credential = Credential::find($id);
        $relatedCustomer = $credential->getCustomer;
        return $credential;
    }
    public function create2(){
        $customer = new Customer();
        $customer->name = "Ali Harake";
        $customer->address = "Beirut";
        $customer->save();

        $credential = new Credential();
        $credential->email = "Ali.haraked@ua.edu.lb";
        $credential->password = "123";
        $credential->customer_id= $customer->id;
        $credential->save();

        $acc1 = new Account();
        $acc1->iban="123";
        $acc1->balance = 1000;
        $acc1->customer_id= $customer->id;
        $acc1->save();

        $acc2 = new Account();
        $acc2->iban="456";
        $acc2->balance = 100000;
        $acc2->customer_id= $customer->id;
        $acc2->save();

        return response()->json(["data"=>"created"]);

    }
    public function getAccountById($id){
        $account  = Account::find($id);
        $relatedCustomer = $account->getCustomer;
        return $account;
    }
    public function create3(){
        $customer = new Customer();
        $customer->name = "Nadine";
        $customer->address = "North";
        $customer->save();

        $credential = new Credential();
        $credential->email = "Nadine@ua.edu.lb";
        $credential->password = "123";
        $credential->customer_id= $customer->id;
        $credential->save();

        $acc1 = new Account();
        $acc1->iban="789";
        $acc1->balance = 100;
        $acc1->customer_id= $customer->id;
        $acc1->save();

        $acc2 = new Account();
        $acc2->iban="111";
        $acc2->balance = 250;
        $acc2->customer_id= $customer->id;
        $acc2->save();

        $service = new Service();
        $service->name= "Service 1";
        $service->save();

        $service2 = new Service();
        $service2->name= "Service 2";
        $service2->save();

        // method 1
        $link = new CustomerService();
        $link->customer_id=$customer->id;
        $link->service_id=$service->id;
        $link->save();

        //method 2
        $customer->getServices()->attach($service2->id);
        $customer->save();

        return response()->json(["data"=>"created"]);

    }
    public function getServiceById($id){
        $service = Service::find($id);
        $relatedCustomer = $service->getCustomers;
        return $service;
    }

    public function getAllCustomers(){
        // SELECT * FROM CUSTOMERS;
        $customers = Customer::all();
        return $customers;
    }

    public function getCustomerByIdOrFail($id)
    {
        //select * from customer where id =?
        $customer = Customer::findOrFail($id);
        $relatedCredentials = $customer->getCredential;
        return $relatedCredentials;
    }

    public function getCustomerByIdOr($id)
    {
        //select * from customer where id =?
        $customer = Customer::findOr($id,function (){
            return "JOE DOE";
        });
        return $customer;
    }

    public function getCustomerByAddress($address){
        //select * from customers where address=?
        $customers = Customer::where("address",$address)
            ->get(); // i want to retrieve an array
        return $customers;
    }

    public function getOneCustomerByAddress($address){
        //select * from customers where address=?
        $customers = Customer::where("address",$address)
            ->first(); // i want to retrieve an array
//            ->firstOrFail()
//                ->firstOr(function(){
//                    return "no data";
//        });
        return $customers;
    }

    public function getAccountsGT100(){
        // select * from accounts where customer_id=3 and balance >100;
        $accounts = Account::where("customer_id",3)
            ->where("balance",">=",1000)
            ->get();
        return $accounts;
    }

    public function getAccountsGT100or(){
        // select * from accounts where customer_id=3 or balance >100;
        $accounts = Account::where("customer_id",3)
            ->Orwhere("balance",">=",10)
            ->get();
        return $accounts;
    }

    public function getAccountsIn(){
        //select * from accounts where id in (1,2,3,4)
        $accounts = Account::whereIn("id",[1,2,3,4,5])
            ->get();
        return $accounts;
    }

    public function getAccountsBetween(){
        //select * from accounts where id between 3 and 10;
        $accounts = Account::whereBetween("id",[3,10])
            ->get();
        return $accounts;
    }

    public function getAliCustomer(){
        $customers = Customer::where("name","like","%Ali%")
            ->get();
        return $customers;
    }
    public function getAllCustomerslimit2(){
        // SELECT * FROM CUSTOMERS limit 2;
        $customers = Customer::take(2)->get();
        return $customers;
    }

    public function getNameCustomers($id){
        //select name, address from customers
        $customers = Customer::select(["name","address"])
            ->where('id',$id)
            ->get();
        return $customers;
    }

    public function getAliCustomer2($name){
        $customers = Customer::where("name","like","%".$name."%")
            ->get();
        return $customers;
    }

    public function getAccountsByBalance(){
//        $accounts = Account::OrderBy("balance")->get();
        $accounts = Account::OrderBy("balance","desc")->get();

        return $accounts;
    }

    public function mix(){
        $customers= Customer::where("name","like","%a%")
                   ->select(["name","address"])
                   ->OrderBy("name")
                    ->get();
        return $customers;
    }

    public function statistics(){
        $count = Customer::count();
        $maxBalance = Account::max("balance");
        $minBalance = Account::min("balance");
        $avgBalance = Account::avg("balance");
        $sumBalance = Account::sum("balance");
        return $sumBalance;
    }
}
