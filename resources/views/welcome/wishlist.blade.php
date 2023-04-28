@extends('layouts.master')
@section('content')

<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Category </li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Management</h3>
              </div>
               <div class="card-header">
                <h3 class="card-title"><a href="">
                  <button type="button" class="btn btn-primary btn-sm">Add </button> </h3></a>
               
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
               
                @if(session()->has('message'))
                 <div class="alert alert-success">
                  {{session()->get ('message')}}
                 </div>
                    @endif
                  
                  
                    

                <table class="table table-bordered table-hover" id="dataTable">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th style="width: 20px">image</th>
                      <th style="width:10px">product</th>
                      <th style="width: 30px">price</th>
                      <th style="width: 40px">quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      @foreach($wish as $d)
                      <tr>
                        
                         <td> {{$d->id}}</td>
                     <td>
                          <img src="{{asset('uploads/'.$d->image)}}"
                         width="50px"
                         height="50px"alt="not image"></td>
                         <td>{{$d->product}}</td>
                         <td>{{$d->price}}</td>
                         <td>{{$d->quantity}}</td>

                       
                         <td> 
                     
                           
                            <button type="button" class="btn btn-danger">
                              <a href="">View</a></button>
                  </td>
                  
                  
                  </tr>
                      @endforeach
                    
                       
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
</div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
  
  @endsection
  {{-- datatable code --}}
  @push('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
  </script>
  <script>
  $(document).ready(function()
  {

    $('#dataTable').DataTable({
      "pageLength" :5
  });//dataTable is id of <table>
  });
  </script>
   @endpush
