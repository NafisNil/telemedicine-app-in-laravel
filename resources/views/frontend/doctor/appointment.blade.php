<!-- filepath: /Users/nafis/doctorapp/resources/views/frontend/doctor/appointment.blade.php -->

@extends('frontend.layouts.master')
@section('title', 'Doctor Appointment')

@section('content')
<div class="container">
    <h1>Doctor Appointment</h1>
    <div id="local-stream" style="width: 640px; height: 480px; background-color: #000;"></div>
    <div id="remote-stream" style="width: 640px; height: 480px; background-color: #000;"></div>
    <button id="start-call">Start Video Call</button>
</div>

<script src="https://cdn.agora.io/sdk/release/AgoraRTC_N.js"></script>
<script>
    const APP_ID = '{{ env('AGORA_APP_ID') }}';
    const CHANNEL = 'doctor_appointment_channel';

    let client = AgoraRTC.createClient({ mode: 'rtc', codec: 'vp8' });

    document.getElementById('start-call').onclick = async function() {
        const response = await fetch('{{ route('generate_token') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        const data = await response.json();
        const token = data.token;
        const uid = Math.floor(Math.random() * 10000); // Generate a random uid

        client.join(token, CHANNEL, uid, function(uid) {
            console.log('User ' + uid + ' join channel successfully');
            let localStream = AgoraRTC.createStream({
                streamID: uid,
                audio: true,
                video: true,
                screen: false
            });
            localStream.init(function() {
                console.log('getUserMedia successfully');
                localStream.play('local-stream');
                client.publish(localStream, function(err) {
                    console.log('Publish local stream error: ' + err);
                });
            }, function(err) {
                console.log('getUserMedia failed', err);
            });
        }, function(err) {
            console.log('Join channel failed', err);
        });

        client.on('stream-added', function(evt) {
            let stream = evt.stream;
            console.log('New stream added: ' + stream.getId());
            client.subscribe(stream, function(err) {
                console.log('Subscribe stream failed', err);
            });
        });

        client.on('stream-subscribed', function(evt) {
            let remoteStream = evt.stream;
            console.log('Subscribe remote stream successfully: ' + remoteStream.getId());
            remoteStream.play('remote-stream');
        });
    };
</script>
@endsection