@extends('backend.layouts.master')
@section('title')
    Doctor Appointment - Index
@endsection
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>My Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Appointment</li>
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
                <h3 class="card-title">My Appointment</h3>


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
                        $name = "Patient";
                    @endphp


                  <tr>
                    <td>{{ ++$key }}</td>
                  <td>{{$patient->full_name}}</td>
                  <td>{{$item->doctor_name->full_name}}</td>
                  <td>{{$item->schedule_name->day}}  |  {{$formattedstartTime}} - {{$formattedendTime}}</td>
            
                    <td>
                      @if ($item->status=='approved')
                      <span class="badge bg-success mb-2">Approved</span> <br>
                      <a href="{{route('appointment.status',[$item->id])}}" class="btn btn-outline-secondary btn-sm m-1">Cancelled</a>
                      @elseif($item->status == 'pending')
                      <span class="badge bg-secondary mb-2">Pending</span> <br>
                      <a href="{{route('appointment.status',[$item->id])}}" class="btn btn-outline-success btn-sm m-1"> Approved</a>
                      @else
                      <span class="badge bg-danger mb-2">Cancelled</span> <br>
                      <a href="{{route('appointment.status',[$item->id])}}" class="btn btn-outline-success btn-sm m-1"> Approved</a>
                      @endif
                    </td>

                    <td>{{$item->created_at->format('d M, Y')}}</td>
                    
                   <td>


               
                    <a href="{{route('record_create',[$item->patient_id,$item->doctor_id])}}" title="Patient Record"><button class="btn btn-outline-info btn-sm m-1"><i class="fas fa-pen-square"></i></button></a>
                    <button class="btn btn-sm btn-outline-primary" onclick="callUser('{{ $item->id }}')"><i class="fas fa-phone-volume"></i>Call</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.2/socket.io.js"></script>
<script>
    const myUserId = '{{ Auth::id() }}';
</script>

<script type="module">
  import { Room, VideoPresets } from 'https://cdn.jsdelivr.net/npm/livekit-client/+esm';

  const localVideo = document.getElementById('localVideo');
  const remoteVideo = document.getElementById('remoteVideo');

  async function connectToLiveKit(roomName) {
      try {
          const response = await fetch(`/livekit/token?room=${roomName}`);
          const data = await response.json();
          const token = data.token;

          const room = new Room();

          room.on('connected', () => {
              console.log('Connected to LiveKit room:', roomName);
          });

          room.on('participantConnected', (participant) => {
              console.log('Participant connected:', participant.identity);
          });

          room.on('participantDisconnected', (participant) => {
              console.log('Participant disconnected:', participant.identity);
          });

          room.on('trackSubscribed', (track, publication, participant) => {
              if (track.kind === 'video') {
                  track.attach(remoteVideo);
              }
          });

          await room.connect('{{ env('LIVEKIT_URL') }}', token); // Use the environment variable for the LiveKit URL

          await room.localParticipant.setCameraEnabled(true, VideoPresets.h500_720p_169);
          await room.localParticipant.setMicrophoneEnabled(true);

          room.localParticipant.videoTracks.forEach((publication) => {
              publication.track.attach(localVideo);
          });

      } catch (error) {
          console.error('LiveKit connection error:', error);
      }
  }

  function callUser(remoteUserId) {
      const roomName = `room-${myUserId}-${remoteUserId}`;
      connectToLiveKit(roomName);
      window.location.href = `/call/${remoteUserId}`;
  }

  // Add your myUserId variable here from blade.
  const myUserId = '{{ Auth::id() }}';

  // Your callUser function needs to be available in the global scope.
  window.callUser = callUser;

</script>
@endsection
