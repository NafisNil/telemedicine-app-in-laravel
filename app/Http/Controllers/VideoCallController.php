<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoCallController extends Controller
{
    //
    public function doctorAppointment()
    {
        return view('frontend.doctor.appointment');
    }

    public function generateToken(Request $request)
    {
        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');
        $channelName = 'doctor_appointment_channel';
        $uid = 0; // Set to 0 to generate a token for any user
        $role = 0; // RoleAttendee
        $expireTimeInSeconds = 3600;
        $currentTimestamp = (new \DateTime("now", new \DateTimeZone('UTC')))->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = $this->buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);

        return response()->json(['token' => $token]);
    }

    private function buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs)
    {
        $token = array(
            "ver" => "1",
            "appID" => $appID,
            "channelName" => $channelName,
            "uid" => $uid,
            "role" => $role,
            "privilegeExpiredTs" => $privilegeExpiredTs
        );

        return \Firebase\JWT\JWT::encode($token, $appCertificate, 'HS256');
    }
}
