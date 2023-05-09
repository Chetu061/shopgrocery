@extends('layouts.master1')
@section('content')

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a>
             <span class="mx-2 mb-0">/</span> <a href="cart.html">Cart</a> 
             <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              Returning customer? <a href="#">Click here</a> to login
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">

              @if ($errors->any())
              <div class="alert alert-danger">
            <ul>
             @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
             @endforeach
            </ul>
            </div>
            @endif
            <form action="{{route('make_order.store')}}" method="post" id="checkout_formid">
              @csrf
              <div class="form-group">
                <label for="country" class="text-black">
                  Country <span class="text-danger">*</span></label>
                <select id="country" class="form-control"  name="country">
                  <option value="1">Select a country</option>    
                  <option value="2">bangladesh</option>    
                  <option value="3">India</option>    
                  <option value="4">Afghanistan</option>    
                  <option value="5">Africa</option>    
                  <option value="6">USA</option>    
                  <option value="7">Antartica</option>    
                  <option value="8">Pakistan</option>    
                  <option value="9">Shrilanka</option>    
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="fname" class="text-black">First Name
                     <span class="text-danger">*</span></label>
                  <input type="text" 
                   class="form-control" id="fname"value=" {{old('fname')}}"name="fname">
                </div>

                <div class="col-md-6">
                  <label for="lname" class="text-black">Last Name 
                    <span class="text-danger">*</span></label>
                  <input type="text" class="form-control"value=" {{old('lname')}}"id="lname" 
                  name="lname">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="companyname" class="text-black">Company Name </label>
                  <input type="text" class="form-control" id="companyname"
                  value=" {{old('companyname')}}" name="companyname">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="address" class="text-black">Address 
                    <span class="text-danger">*</span></label>
                  <input type="textarea" class="form-control" id="address"value=" {{old('address')}}" name="address"
                   placeholder="Street address">
                </div>
              </div>

            

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="state" class="text-black">State  <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="state" name="state"value=" {{old('state')}}">
                </div>
                <div class="col-md-6">
                  <label for="city" class="text-black">City <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="city" name="city"value=" {{old('city')}}">
                </div>
                <div class="col-md-6">
                  <label for="zip_code" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="zip_code" value=" {{old('zip_code')}}"
                  name="zip_code">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="email" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email"value=" {{old('email')}}">
                </div>
                <div class="col-md-6">
                  <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="phone" value=" {{old('phone')}}"
                  name="phone" >
                </div>
              </div>
{{-- 
              <div class="form-group">
                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                    <div class="form-group">
                      <label for="password" class="text-black">Account Password</label>
                      <input type="email" class="form-control" id="password"
                       name="password" placeholder="">
                    </div>
                  </div>
                </div>
              </div> --}}


              <div class="form-group">
                <label for="comments" class="text-black">Order Notes</label>
                <textarea name="comments" id="comments" cols="30" rows="5" 
                class="form-control" placeholder="Write your notes here..."></textarea>
              </div>

              <h4>Payment Method</h4>
              <label class="checkbox-title">
											<input id="payment_method_cod" name="status" type="radio" 
											value="1"><img src="{{ asset('images/cash_on_delivery.png')}}" 
											alt="Cash on Delivery" />
									<br>
											<input id="payment_method_bank" name="status" type="radio" value="2">
											<img src="{{ asset('images/bank_transfer.png')}}" alt="Bank Transfer" />
										</label><br>
<button class="btn btn-primary checkout_btn">Submit</button>
            </div>
          </div>
       
          <div class="col-md-6">

            {{-- <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                <div class="p-3 p-lg-5 border">
                  
                  <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                  <div class="input-group w-75">
                    <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Apply</button>
                    </div>
                  </div>

                </div>
              </div>
            </div> --}}
              </form> 
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Top Up T-Shirt <strong class="mx-2">x</strong> 1</td>
                        <td>Rs.250.00</td>
                      </tr>
                      <tr>
                        <td>Polo Shirt <strong class="mx-2">x</strong>   1</td>
                        <td>Rs.100.00</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black">Rs.350.00</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>Rs.350.00</strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                        <p class="mb-0">
                          Make your payment directly into our bank account. 
                          Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    
                    <a href="{{route('welcome.thankyou')}}">
                      <button class="btn btn-primary btn-lg py-3 btn-block" >Place Order</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
    
      </div>
    </div>
@endsection