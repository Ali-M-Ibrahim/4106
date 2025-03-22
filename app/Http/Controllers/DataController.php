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
        $customer->dob = "2025-03-22";
        $customer->save();

        $credential= new Credential();
        $credential->email= "ali@hotmail.com";
        $credential->password="123";
        $credential->customer_id= $customer->id;
        $credential->save();

        return "ok data created";
    }
    public function getCustomerById($id){
        // SELECT * FROM CUSTOMERES WHERE ID=?
        $customer = Customer::find($id);
        $customer->getCredential;
        $customer->getAccounts;
        $customer->getServices;
        return $customer;
    }
    public function getCredentialById($id){
        // SELECT * FROM CREDENTIAL WHERE ID=?;
        $credential = Credential::find($id);
        $credential->getCustomer;
        return $credential;
     }
    public function create2(){
        $customer = new Customer();
        $customer->name = "Ghattas Saliba";
        $customer->address = "Baabda";
        $customer->dob = "2025-03-22";
        $customer->save();

        $credential= new Credential();
        $credential->email= "ghatas@hotmail.com";
        $credential->password="123";
        $credential->customer_id= $customer->id;
        $credential->save();

        $account1 = new Account();
        $account1->iban = "123";
        $account1->customer_id = $customer->id;
        $account1->save();

        $account2 = new Account();
        $account2->iban = "345";
        $account2->customer_id = $customer->id;
        $account2->save();

        $account3 = new Account();
        $account3->iban = "345";
        $account3->customer_id = $customer->id;
        $account3->save();

        return "ok data saved";
    }
    public function getAccountById($id){
        $account = Account::find($id);
        $relatedCustomer = $account->getCustomer;
        $relatedCredential = $relatedCustomer->getCredential;
        return $account;
    }
    public function create3(){
        $customer = new Customer();
        $customer->name = "Jobran Zaayter";
        $customer->address = "Baabda";
        $customer->dob = "2025-03-22";
        $customer->save();

        $credential= new Credential();
        $credential->email= "jobran@hotmail.com";
        $credential->password="123";
        $credential->customer_id= $customer->id;
        $credential->save();

        $account1 = new Account();
        $account1->iban = "444";
        $account1->customer_id = $customer->id;
        $account1->save();

        $account2 = new Account();
        $account2->iban = "555";
        $account2->customer_id = $customer->id;
        $account2->save();

        $account3 = new Account();
        $account3->iban = "666";
        $account3->customer_id = $customer->id;
        $account3->save();

        $service1 = new Service();
        $service1->name ="Service 1";
        $service1->save();

        $service2 = new Service();
        $service2->name ="Service 2";
        $service2->save();

        // method 1
        $link = new CustomerService();
        $link->customer_id=$customer->id;
        $link->service_id= $service1->id;
        $link->save();

        // method 2
        $customer->getServices()->attach($service2->id);
        $customer->save();

        return "ok data saved";
    }
    public function getServiceById($id){
        $service = Service::find($id);
        $service->getCustomers;
        return $service;
    }
    public function getAllCustomers(){
        // SELECT * FROM CUSTOMERS;
        $customers = Customer::all();
        return $customers;
    }
    public function getCustomerByIdOrFail($id){
        // SELECT * FROM CUSTOMER WHERE ID=?
        $customer = Customer::findOrFail($id);
        $customer->getCredential;
        return $customer;
    }
    public function getCustomerByIdOr($id){
        // SELECT * FROM CUSTOMER WHERE ID=?
        $customer = Customer::findOr($id,function(){
            return "no customer";
        });
        return $customer;
    }
    public function getAllCustomersByAddress($address){
        // select * from customers where address=?;
        $customer = Customer::where("address",$address)
            ->get(); // to return array
        return $customer;
    }
    public function getOneCustomerByAddress($address){
        // select * from customers where address=? limit 1;
        $customer = Customer::where("address",$address)
            ->first(); // to return array
        return $customer;
    }
    public function getCustomersInBeirutAndDob(){
        // select * from customers where address="Beirut"
        // and dob > "2023-01-01";
        $customer = Customer::where("address","Beirut")
            ->where("dob",">","2024-01-01")
            ->get();
        return $customer;
    }
    public function getCustomersInBeirutOrDob(){
        // select * from customers where address="Beirut"
        // or dob > "2022-01-01";

        $customer = Customer::where("address","Beirut")
            ->OrWhere("dob",">","2022-01-01")
            ->get();

        return $customer;
    }
    public function getCustomerByAccount(){
        $customer= Customer::with(['getAccounts' =>
            function($query)
                {
                    $query->where('iban',"444");
                }
            ])
        ->get();
        return $customer;
    }
    public function getCustomerByAccount2()
    {
        $customer = Customer::whereHas('getAccounts', function ($q) {
            $q->where('iban', '=', "444");

        })->get();

        return $customer;
    }
    public function getCustomerLike(){
        // select * from customers where address="Beirut"
        // or dob > "2022-01-01";
        $customer = Customer::where("name","LIKE","%Ali%")
            ->get();
        return $customer;
    }
    public function getCustomerIn(){
        // select * from customers where id in (1,2,3,4,5)
        $customers = Customer::whereIn("id",[1,2,3,4,5])
            ->get();
        return $customers;
    }

    public function getCustomerBetween(){
        // select * from customers where dob between '2020-01-01'
        // and '2020-10-10'

        $customer = Customer::
        whereBetween("dob",["2020-01-01","2024-01-01"])
            ->get();
        return $customer;
    }

    public function getCustomerLimit(){
        // select * from customers limit 2
        $customers = Customer::take(2)->get();
        return $customers;
    }


    public function getNameDobCustomers(){
        //select name, dob from customers
        $customers= Customer::select(["name","dob"])->get();
        return $customers;
    }

    public function getCustomersOrdered(){
        //select *  from customers order by dob asc
        $customers = Customer::OrderBy("dob")->get();

        //select *  from customers order by dob desc
        $customers = Customer::OrderBy("dob","desc")->get();

        return $customers;
    }

    public function mix(){

        $customer = Customer::where("address","Beirut")
            ->select(["name","dob"])
            ->take(2)
            ->OrderBy("dob")
            ->get();
        return $customer;
    }

    public function statistics(){
        //select count(1) from customers
        $count = Customer::count();

        //select max(id) from customers
        $maxId = Customer::max("id");

        //select min(id) from customers
        $minId = Customer::min("id");


        //select avg(id) from customers
        $avgId = Customer::avg("id");

        //select sum(id) from customers
        $sumId = Customer::sum("id");
        return $sumId;


    }

}
