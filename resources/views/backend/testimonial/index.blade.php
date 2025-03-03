@extends('backend.layouts.master')
@section('title')
    Testimonials- Index
@endsection
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Testimonials</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Testimonials</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row offset-1">
          <!-- left column -->
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Testimonials</h3>

                <a href="{{route('testimonial.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>


           


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Description</th>
                   <td>Photo</td>
                
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>






                  

                   @foreach ($testimonial as $item)
                       
                  
                    <tr>
                      <td>1</td>
                      <td>  {!! $item->name !!} </td>
                      <td>  {!! $item->designation !!} </td>
                      <td>  {!! $item->description !!} </td>
                      <td> <img src="{{(!empty($item->photo))?URL::to('storage/'.$item->photo):URL::to('image/no_image.png')}}" alt="" style="max-height:50px"></td>
                
                   
                     <td>
  
  
                        <a href="{{route('testimonial.edit',[$item])}}" title="Edit"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
  
  
  
  
                        <form action="{{route('testimonial.destroy',[$item])}}" method="POST">
                      
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-outline-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
  
  
  
                      </td>
  
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Description</th>
                   <td>Photo</td>
                    <th>Action</th>

                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
