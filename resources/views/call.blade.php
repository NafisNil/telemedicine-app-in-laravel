@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <h1>Doctor Appointment</h1>
    <div class="video-container">
        <video id="localVideo" class="video" autoplay muted playsinline></video>
        <video id="remoteVideo" class="video" autoplay playsinline></video>
    </div>
    <button id="start-call">Start Video Call</button>
</div>

<style>
    .video-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .video {
        width: 100%;
        max-width: 640px;
        height: auto;
        background-color: #000;
        margin-bottom: 10px;
    }

    @media (min-width: 768px) {
        .video-container {
            flex-direction: row;
            justify-content: space-around;
        }

        .video {
            width: 45%;
            height: auto;
        }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.2/socket.io.js"></script>
<script>
    const appointmentId = '{{ $appointmentId }}';
</script>

<script type="module">
    import { Room, VideoPresets } from 'https://cdn.jsdelivr.net/npm/livekit-client/+esm';

    const localVideo = document.getElementById('localVideo');
    const remoteVideo = document.getElementById('remoteVideo');
    const startCallButton = document.getElementById('start-call');

    async function connectToLiveKit(roomName) {
        try {
            console.log("Room Name:", roomName);
            const response = await fetch(`/livekit/token?room=${roomName}`);
            const data = await response.json();
            const token = data.token;
            console.log("Token:", token);

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

            room.on('trackSubscribed', (track, participant) => {
                if (track.kind === 'video') {
                    track.attach(remoteVideo);
                    console.log('Track Subscribed', track);
                }
            });

            room.on('connectionStateChanged', (state) => {
              console.log('Connection State Changed:', state);
            });

            await room.connect('wss://doctor-app-5kstqbtr.livekit.cloud', token);

            await room.localParticipant.setCameraEnabled(true, VideoPresets.h500_720p_169);
            await room.localParticipant.setMicrophoneEnabled(true);

            room.localParticipant.videoTracks.forEach((publication) => {
                publication.track.attach(localVideo);
            });

        } catch (error) {
            console.error('LiveKit connection error:', error);
        }
    }

    startCallButton.addEventListener('click', () => {
        connectToLiveKit(appointmentId);
    });

</script>
@endsection