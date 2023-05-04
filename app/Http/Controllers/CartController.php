<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\user;
use Cart;
// mistake
class CartController extends Controller
{
	//Add to Wishlist
	public function addToWishlist($id){

		$res = array();
		$datalist = Product::where('id', $id)->first();

		$user = User::where('id', $datalist['user_id'])->first();
        $data = array();
		$data['id'] = $datalist['id'];
		$data['name'] = $datalist['title'];
		$data['qty'] = 1;
		$data['price'] = $datalist['sale_price']; //mistake
		$data['weight'] = 0;
// dd($data);
		$response = Cart::instance('wishlist')->add($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('New Wishlist Data Added Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Added product to wishlist failed.');
		}

		return response()->json($res);
	}
    public function countWishlist(){

		$count = Cart::instance('wishlist')->content()->count();
    //  dd($count);
		return response()->json($count);
	}
	
    public function AddToCart($id){
	
		$res = array();
		$datalist = Product::where('id', $id)->first();
		$user = User::where('id', $datalist['user_id'])->first();

		$data = array();
		$data['id'] = $datalist['id'];
		$data['name'] = $datalist['title'];
        $data['qty'] = 1;
		// $data['qty'] = $qty == 0 ? 1 : $qty;
		$data['price'] = $datalist['sale_price']; //mistake
		$data['weight'] = 0;
    // dd($data);
		$response = Cart::instance('shopping')->add($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('New Add_to_cart Data Added Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Added product to cart failed.');
		}

		return response()->json($res);
	}
	public function getViewCartData(){
		// $gtext = gtext();
		// $gtax = getTax();

		$data = Cart::instance('shopping')->content();

		// $tax_rate = $gtax['percentage'];
		// config(['cart.tax' => $tax_rate]);

		// foreach ($data as $key => $row) {
		// 	$row->setTaxRate($tax_rate);
			$data=Cart::instance('shopping')->update($data->sale_price, $data->quantity);
		
		// }
		
		$count = Cart::instance('shopping')->count();
		// $subtotal = Cart::instance('shopping')->subtotal();
		// $tax = Cart::instance('shopping')->tax();
		// $priceTotal = Cart::instance('shopping')->priceTotal();
		$total = Cart::instance('shopping')->total();
		
		// $discount = Cart::instance('shopping')->discount();
	
		// $datalist = array();
		// $datalist['total_qty'] = $count;
		// if($gtext['currency_position'] == 'left'){
		// 	$datalist['sub_total'] = $gtext['currency_icon'].$subtotal;
		// 	$datalist['tax'] = $gtext['currency_icon'].$tax;
		// 	$datalist['price_total'] = $gtext['currency_icon'].$priceTotal;
			// $datalist['total'] = $gtext['currency_icon'].$total;
		// 	$datalist['discount'] = $gtext['currency_icon'].$discount;
		// }
		// else{
		// 	$datalist['sub_total'] = $subtotal.$gtext['currency_icon'];
		// 	$datalist['tax'] = $tax.$gtext['currency_icon'];
		// 	$datalist['price_total'] = $priceTotal.$gtext['currency_icon'];
			// $datalist['total'] = $total.$gtext['currency_icon'];
		// 	$datalist['discount'] = $discount.$gtext['currency_icon'];
		// }
	
		
		return response()->json($datalist);
    }
	//Remove to Cart
	public function RemoveToCart($rowid){
		$res = array();

		$response = Cart::instance('shopping')->remove($rowid);

		if($response == ''){
			$res['msgType'] = 'success';
			$res['msg'] = __('Data Removed Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data remove failed');
		}
		
		// return response()->json($res);
		return redirect()->route('welcome.cart')->with('message',"Cart remove Successfully!");
	}
	public function RemoveToWishlist($rowid){
		$res = array();

		$response = Cart::instance('wishlist')->remove($rowid);

		if($response == ''){
			$res['msgType'] = 'success';
			$res['msg'] = __('Data Removed Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Data remove failed');
		}
		
		// return response()->json($res);
		return redirect()->route('welcome.wishlist')->with('message',"Wishlist remove Successfully!");
	}
	
	
}
