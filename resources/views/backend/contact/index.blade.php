@extends('backend.layouts.master')
@section('title')
    About Us- Index
@endsection
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Contact Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact Us</li>
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
                <h3 class="card-title">Contact Us</h3>

                @if ($contactCount < 1)
                <a href="{{route('contact.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>

                @endif
           


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th> Map</th>
                
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>






                  

                    @if ($contactCount > 0)
                    <tr>
                      <td>1</td>
                      <td>  {!! $contact->address !!} </td>
                      <td>  {!! $contact->phone !!} </td>
                      <td>  {!! $contact->email !!} </td>
                      <td>  {!! $contact->map !!} </td>
                   
                   
                     <td>
  
  
                        <a href="{{route('contact.edit',[$contact])}}" title="Edit"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
  
  
  
  
                        <form action="{{route('contact.destroy',[$contact])}}" method="POST">
                      
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-outline-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
  
  
  
                      </td>
  
                    </tr>
                    @endif

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th> Map</th>
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
