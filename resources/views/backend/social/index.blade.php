@extends('backend.layouts.master')
@section('title')
    Social Media Us- Index
@endsection
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Social Media Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Social Media Us</li>
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
                <h3 class="card-title">Social Media Us</h3>

                @if ($socialCount < 1)
                <a href="{{route('social.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>

                @endif
           


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Youtube</th>
                    <th>Linkedin</th>
                    <th>Twitter</th>
               
                
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>






                  

                   @foreach ($social as $item)
                       
                  
                    <tr>
                      <td>1</td>
                      <td>  {!! $item->facebook !!} </td>
                      <td>  {!! $item->instagram !!} </td>
                      <td>  {!! $item->youtube !!} </td>
                      <td>  {!! $item->linkedin !!} </td>
                      <td>  {!! $item->twitter !!} </td>
                     
                     <td>
  
  
                        <a href="{{route('social.edit',[$item])}}" title="Edit"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
  
  
  
  
                        <form action="{{route('social.destroy',[$item])}}" method="POST">
                      
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
                
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Youtube</th>
                    <th>Linkedin</th>
                    <th>Twitter</th>
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
