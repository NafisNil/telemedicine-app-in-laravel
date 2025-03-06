@extends('backend.layouts.master')
@section('title')
    Doctor List - Index
@endsection
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>doctor list</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">doctor list</li>
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
                <h3 class="card-title">Doctor List</h3>


                <a href="{{route('doctor.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>



              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
              
                    <th>Cover Photo</th>
                    <th>Specialization</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>License Number</th>
                    <th>Price </th>
                    <th>Status</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>






                    @foreach ($doctor as $key=>$item)




                  <tr>
                    <td>{{ ++$key }}</td>
                  <td>{{$item->full_name}}</td>
             
                    <td> <img src="{{(!empty($item->photo))?URL::to('storage/'.$item->photo):URL::to('image/no_image.png')}}" alt="" style="max-height:80px;border-radius:40%"></td>
                    <td>{{@$item->specialization_name->title}}</td>
                    <td> <a href="tel:{{$item->phone}}">{!! $item->phone  !!}</a> </td>
                    <td> <a href="mailto:{{$item->email}}">{!! $item->email  !!}</a> </td>
                    <td><span style="color: #013714"><b>{{$item->license_number}}</b></span></td>
                    <td>  <b>{{$item->price}} </b> USD</td>
                    <td>
                      @if ($item->status=='active')
                      <span class="badge bg-success mb-2">Active</span>
                      <a href="{{route('doctor.status',[$item->slug])}}" class="btn btn-outline-danger btn-xs mt-1">Make Inactive</a>
                      @else
                      <span class="badge bg-danger mb-2">Inactive</span>
                      <a href="{{route('doctor.status',[$item->slug])}}" class="btn btn-outline-success btn-xs mt-1">Make Active</a>
                      @endif
                    </td>
                    
                   <td>


                      <a href="{{route('doctor.edit',[$item])}}" title="Edit"><button class="btn btn-outline-info btn-sm m-1"><i class="fas fa-pen-square"></i></button></a>

                      <a href="{{route('doctor.show',[$item])}}" title="Show"><button class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-eye"></i></button></a>



                      <form action="{{route('doctor.destroy',[$item])}}" method="POST">
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
                    <th>Full Name</th>
              
                    <th>Cover Photo</th>
                    <th>Specialization</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>License Number</th>
                    <th>Price </th>
                    <th>Status</th>
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
