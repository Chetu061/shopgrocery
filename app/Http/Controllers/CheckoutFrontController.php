<?php

namespace App\Http\Controllers;

use App\Models\Ordermaster;
use Illuminate\Http\Request;

class CheckoutFrontController extends Controller
{
    public function LoadMakeOrder(Request $request)
{
    // dd($request);
    $request->validate(
    [
    'fname'=>'required',
    'lname'=>'required',
    'companyname'=>'required',
    'address'=>'required',
    'state'=>'required',
    'zip_code'=>'required',
    'email'=>'required',
    'phone'=>'required',
    'comments'=>'required',
   
    
    ]); 
    $data=new Ordermaster();
    $data->country=$request->country;
    $data->fname=$request->fname;
    $data->lname=$request->lname;
    $data->companyname=$request->companyname;
    $data->address=$request->address;
    $data->state=$request->state;
    $data->city=$request->city;
    $data->zip_code =$request->zip_code; 
    $data->email=$request->email;
    $data->phone=$request->phone;
    $data->comments=$request->comments;
    $data->status=$request->status;
    // dd($data);
    $data->save();
return redirect()->route('')->with('message',"Data Store Successfully!");
}

}
