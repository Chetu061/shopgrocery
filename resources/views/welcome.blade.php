@extends('layouts.master1')
@section('content')

    <div class="site-blocks-cover" style="background-image: url(images/12.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">Finding Your Perfect Product</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">An ecommerce website is a digital platform
                 that allows businesses to sell products and services online. 
                 These websites provide a convenient and easy way for customers to shop 
                 from the comfort of their own homes, without the need to physically visit
                  a brick-and-mortar store.<p>
    <a href="#" class="btn btn-sm btn-primary">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Shipping</h2>
              <p>Free shipping is a popular marketing strategy used by ecommerce
                 websites to attract and retain customers. </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Returns</h2>
              <p>Free returns is another popular marketing strategy used by ecommerce websites to build trust and confidence with their customers.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Customer Support</h2>
              <p>Customer support is a critical aspect of any ecommerce website, as it helps businesses to build trust and loyalty with their customers. </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row justify-content-center">
          @foreach($category as $cate)
          <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="{{asset('uploads/'.$cate->image)}}" alt="" width="250px" height="250px" >
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>{{$cate->title}}</h3>
                 
                
              </div>
              
            </a>
          </div>
          {{-- <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/children.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Children</h3>
              </div>
            </a>
          </div> --}}
          {{-- <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/men.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Men</h3>
              </div>
            </a>
          </div> --}}
          @endforeach
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              @foreach($products as $product)
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{asset('uploads/'.$product->image)}}"
                    width="320px" height="217.14px" alt="Image placeholder" >
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">{{$product->title}}</a></h3>
                    <p class="mb-0">{!!$product->description!!}</p>
                    <p class="text-primary font-weight-bold">{{$product->sale_price}}</p>
                    {{-- changes --}}
                 
                    <a  class="site-cart" id="quantity" data-id="{{ $product->id }}">
                      {{-- below class give and id also ,data id="product->id" --}}
                      <span class="icon icon-shopping_cart"></span>

                <a class="addtowishlist" data-id="{{ $product->id }}" >
                  <span class="icon icon-heart-o"></span></a>
                
                   
                    
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Big Sale!</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="#"><img src="{{asset('uploads/'.$latest->image)}}"
               width="500px" height="635px" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2><a href="#">50% less in all items</a></h2>
            <p class="post-meta mb-4">By <a href="#">Shoppers</a> <span class="block-8-sep">&bullet;</span> April 23, 2023</p>
            <p>Big sales can be a great opportunity for customers to save money on products that they have been wanting to purchase, and for businesses to clear out old inventory and make room for new products.</p>
            <p><a href="#" class="btn btn-primary btn-sm">Shop Now</a></p>
          </div>
        </div>
      </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
  
    	$(document).on("click", ".addtowishlist", function(event) {

		event.preventDefault();
        const base_url = "http://127.0.0.1:85";
		const id = $(this).data('id');
        //  alert('hrllo');
//  console.log("success");

		$.ajax({
			type : 'GET',
            url: '/add_to_wishlist/' + id,
			dataType:"json",

			success: function (response) {
				var msgType = response.msgType;
				var msg = response.msg;

				if (msgType == "success") {
					return "Data added successfully"
				} else {
					onErrorMsg(msg);
				}
				onWishlist();
			}
		});
    });


    $(document).on("click", ".site-cart", function(event) { //classname
		event.preventDefault();

		const qty = $("#quantity").val();//idname
		const id = $(this).data('id');
  //  alert('hello');
//  console.log("success");
	

		$.ajax({
			type : 'GET',
			url: '/add_to_cart/' + id,
			dataType:"json",

			success: function (response) {
				var msgType = response.msgType;
				var msg = response.msg;
  // alert('msg');
				if (msgType == "success") {
					onSuccessMsg(msg);
				} else {
					onErrorMsg(msg);
				}
				onViewCart();
			}
		});
    });

function onWishlist() {

$.ajax({
type : 'GET',
url: base_url + '/count_wishlist/',
dataType:"json",
success: function (data) {

  $(".count_wishlist").text(data);

}
});
}

function onViewCart() {

$.ajax({
type : 'GET',
url: base_url + '/view_cart/',
dataType:"json",
success: function (data) {
//   if(data.items == ''){
//     $(".has_item_empty").show();
//     $(".has_cart_item").hide();
//     $(".total_qty").text(0);
//   }else{
//     $(".has_item_empty").hide();
//     $(".has_cart_item").show();
    
//     $('#tp_cart_data').html(data.items);
//     $('#tp_cart_data_for_mobile').html(data.items);
    
//     $(".total_qty").text(data.total_qty);
//     $(".sub_total").text(data.sub_total);
//     $(".tax").text(data.tax);
//     $(".tp_total").text(data.total);
//   }
}
});
}
</script>