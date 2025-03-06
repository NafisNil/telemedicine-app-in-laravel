@extends('backend.layouts.master')
@section('title')
    Doctor Schedule - Index
@endsection
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>doctor Schedule</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">doctor Schedule</li>
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
                <h3 class="card-title">Doctor Schedule</h3>


                <a href="{{route('schedule.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>



              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                
            
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
               
                    <th>Status</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>






                    @foreach ($schedule as $key=>$item)

                    @php
                        $carbonstartTime = Carbon\Carbon::createFromFormat('H:i:s', $item->start); // Parse the time string
                        $formattedstartTime = $carbonstartTime->format('g:i A'); // Format as "g:i A"

                        $carbonendTime = Carbon\Carbon::createFromFormat('H:i:s', $item->end); // Parse the time string
                        $formattedendTime = $carbonendTime->format('g:i A'); // Format as "g:i A"
                    @endphp


                  <tr>
                    <td>{{ ++$key }}</td>
                  <td>{{$item->day}}</td>
                  <td>{{$formattedstartTime}}</td>
                  <td>{{$formattedendTime}}</td>
            
                    <td>
                      @if ($item->status=='available')
                      <span class="badge bg-success mb-2">Available</span> <br>
                      <a href="{{route('schedule.status',[$item->id])}}" class="btn btn-outline-secondary btn-sm m-1">Make Booked</a>
                      @else
                      <span class="badge bg-secondary mb-2">Booked</span> <br>
                      <a href="{{route('schedule.status',[$item->id])}}" class="btn btn-outline-success btn-sm m-1">Make Available</a>
                      @endif
                    </td>
                    
                   <td>


                      <a href="{{route('schedule.edit',[$item])}}" title="Edit"><button class="btn btn-outline-info btn-sm m-1"><i class="fas fa-pen-square"></i></button></a>


                      <form action="{{route('schedule.destroy',[$item])}}" method="POST">
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
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
               
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
