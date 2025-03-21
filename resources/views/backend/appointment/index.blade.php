@extends('backend.layouts.master')
@section('title')
    Doctor Appointment - Index
@endsection
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>doctor Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">doctor Appointment</li>
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
                <h3 class="card-title">Doctor Appointment</h3>


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                
            
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Schedule</th>
               
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>






                    @foreach ($appointment as $key=>$item)

                    @php
                        $carbonstartTime = Carbon\Carbon::createFromFormat('H:i:s', $item->schedule_name->start); // Parse the time string
                        $formattedstartTime = $carbonstartTime->format('g:i A'); // Format as "g:i A"

                        $carbonendTime = Carbon\Carbon::createFromFormat('H:i:s', $item->schedule_name->end); // Parse the time string
                        $formattedendTime = $carbonendTime->format('g:i A'); // Format as "g:i A"
                        
                        $patient = App\Models\User::where('id', $item->patient_id)->first();
                    @endphp


                  <tr>
                    <td>{{ ++$key }}</td>
                  <td>{{$patient->full_name}}</td>
                  <td>{{$item->doctor_name->full_name}}</td>
                  <td>{{$item->schedule_name->day}}  |  {{$formattedstartTime}} - {{$formattedendTime}}</td>
            
                    <td>
                      @if ($item->status=='available')
                      <span class="badge bg-success mb-2">Available</span> <br>
                      {{-- <a href="{{route('schedule.status',[$item->id])}}" class="btn btn-outline-secondary btn-sm m-1">Make Booked</a> --}}
                      @elseif($item->status == 'pending')
                      <span class="badge bg-secondary mb-2">Pending</span> <br>
                      {{-- <a href="{{route('schedule.status',[$item->id])}}" class="btn btn-outline-success btn-sm m-1">Make Available</a> --}}
                      @else
                      <span class="badge bg-danger mb-2">Cancelled</span> <br>
                      @endif
                    </td>

                    <td>{{$item->created_at->format('d M, Y')}}</td>
                    
                   <td>


               

                      <form action="{{route('appointment.destroy',[$item])}}" method="POST">
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
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Schedule</th>
               
                    <th>Status</th>
                    <th>Date</th>
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
