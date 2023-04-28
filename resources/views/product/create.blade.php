@extends('layouts.master')
@section('content')

<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Product</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Product_Form </li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if ($errors->any())
              <div class="alert alert-danger">
            <ul>
             @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
             @endforeach
            </ul>
            </div>
            @endif
              <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data"> 
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Title</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}"id="exampleInputEmail1" 
                    placeholder="Enter Title">
                  </div>
                 
                  <div class="form-group">
                      <label for="exampleInputEmail1">Enter Description</label>
                      <input type="text" name="description" class="form-control" 
                      value="{{old('description')}}" id="exampleInputEmail1" 
                      placeholder="Enter description">
                    </div>
                    <div class="form-group">
                      <label for="image">Choose Image</label>
                      <input type="file" aria-describedby="image"  class="form-control" 
                      id="image" name="image" value="{{old('image')}}">
                    </div>

                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Enter sale_price</label>
                      <input type="text" name="sale_price" class="form-control" value="{{old('sale_price')}}"id="exampleInputEmail1" 
                      placeholder="Enter sale_price">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Choose Category</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                          @foreach($data as $d)
                        <option value="{{$d->id}}">{{$d->title}}</option>
                          @endforeach
                      </select>
                    </div>
                  
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                  </div>
              </form>
            </div>
            </div>
            </div>
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
 
@endsection
