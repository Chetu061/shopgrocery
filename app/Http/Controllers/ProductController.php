<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pro_image;
use App\Models\Related_product;
class ProductController extends Controller
{
    public function create()
{
    $data=Category::where('status','=',1)->get();
    return view('product.create',compact('data'));
}
public function store(Request $request)
{$request->validate(
    ['title'=>'required',
    'description'=>'required',
    'image'=>'required'
    
    ]); 
    $data=new Product();
    $data->title=$request->title;
    $data->description=$request->description;
    if ($request->hasFile('image')) {
        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads', $filename);
        $data->image = $filename;
    }
    $data->sale_price=$request->sale_price;
    $data->category_id =$request->category_id; 
    $data->save();
return redirect()->route('products')->with('message',"Data Store Successfully!");
}

public function index() 
{ $data = Product::with('category')->get();
    // dd($data);//$data=Product::all();
    return view('product.index',compact('data'));
} 
public function edit($id)
{
    $data=Product::find($id);
     $cust=Category::where('status','=',1)->get();
    return view('product.edit',compact('data','cust'));
}
public function update(Request $request,$id)
{
    $data=Product::find($id);
    $data->title=$request->title;
    $data->description=$request->description;
    if ($request->hasFile(key: 'image')) {
        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads', $filename);
        $data->image = $filename;
    }
    $data->sale_price=$request->sale_price;

    $data->category_id = $request->category_id;
    //dd($user);

    $data->save();
    return redirect()->route('products')->with('message',"Data Update Successfully!");
}public function delete($id)
{
    $data=Product::find($id);
    $data->delete();
    return redirect()->route('products')->with('message',"Data Delete Successfully!");
}
//get Product Page
public function getProductPage($id){

    $data=Product::find($id);
//  dd($data);

    return view('welcome.productview',compact('data'));
}

}  
