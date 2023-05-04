
@extends('layouts.master1')
@section('content')


    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> 
            <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" >
            <div class="site-blocks-table">
              @if(session()->has('message'))
<div class="alert alert-success">
 {{session()->get ('message')}}
</div>
   @endif
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">SoldBy</th>
                    <th class="product-remove">Quantity</th>

                    <th class="product-remove">Price</th>
                     <th class="product-price">Action</th>
                   
              
                  </tr>
                </thead>
                <tbody>
                  {{-- for wishlist file --}}
                  @foreach($wish as $d)
                  {{-- @dd($d) --}}
                  <?php
                  $product=\App\Models\Product::find($d->id);
                  // @dd($product)
                  ?>
            
                  <tr>
                    <td class="product-thumbnail">
                      <img src="{{asset('uploads/'.$product->image)}}" alt="" 
                      width="50px" height="49px" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{$product->title}}</h2>
                    </td>
                    <td>priti</td>
                    <td>2</td>
                    <td>{{$product->sale_price}}</td>
                    <td>
                      
                      <a class="pro-remove" data-id="{{ $d->rowId }}"
                        id="removetoviewcart_{{ $product->id }}"
                         href="{{route('welcome.productview',$product->id)}}">
                        <button class="btn btn-outline-primary " type="button">View</button></a>
                       
                   
                        
                        
                          <a class="pro-remove" data-id="{{ $d->rowId }}"
                            id="removetowishlist_{{ $product->id }}"
                             href="{{route('frontend.remove_to_wishlist',$d->rowId)}}" >
                             <button type="submit"class="btn  btn-alert btn-sm">Remove</a></td>
                            </button>
                      </div>
                    </div>
                    </td>
                  
                   
                  </tr>
                 
                  @endforeach
                </tbody>
              </table>
            </div>
          </form>
        </div>

        
      </div>
    </div>

    @endsection
  