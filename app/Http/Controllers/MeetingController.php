<?php

namespace App\Http\Controllers;
use App\Models\Meetings;
// use App\Models\Role;

use App\Models\Vendor;
use App\Models\Vendoruser;
use App\Models\Websites;
use Illuminate\Http\Request;
// use Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class MeetingController extends Controller
{
    public function meetinglist()
    {
        $meetings = Meetings::with(['site:id,sitename', 'vendorUserId:id,name', 'vendorId:id,name'])->orderBy('id', 'DESC')->get();
        return view('meeting.index', compact('meetings'));
    }

    public function addmeting()
    {
        $meeting = null;
        $vendor = Vendor::where('status', 1)->get();
        return view('meeting.add', compact('meeting', 'vendor'));
    }

    public function getwebsitesvendoruser(Request $request)
    {
        $websites = Websites::where('vendor_id', $request?->vendor_id)->get();
        $vendorusers = Vendoruser::where('vendor_id', $request?->vendor_id)->get();
        // dd($website ,$vendoruser);
        return response()->json([
            'websites' => $websites,
            'vendor_users' => $vendorusers,
        ]);
    }

    private function createZoomMeeting($topic, $date)
    {
        $tokenResponse = Http::asForm()->withBasicAuth(
            env('ZOOM_CLIENT_ID'),
            env('ZOOM_CLIENT_SECRET')
        )->post('https://zoom.us/oauth/token', [
                    'grant_type' => 'account_credentials',
                    'account_id' => env('ZOOM_ACCOUNT_ID'),
                ]);

        $accessToken = $tokenResponse['access_token'];

        $meetingResponse = Http::withToken($accessToken)->post(
            'https://api.zoom.us/v2/users/me/meetings',
            [
                'topic' => $topic,
                'type' => 2,
                'start_time' => $date,
                'duration' => 60,
                'timezone' => 'Asia/Kolkata',
                'settings' => [
                    'join_before_host' => true,
                    'approval_type' => 0,
                ],
            ]
        );

        return $meetingResponse->json();
    }


    public function insertmeeting(Request $request)
    {
        $request->validate([
            'siteId' => 'required|max:10',
            'name' => 'required|max:225',
            'course' => 'required|max:225',
            'phone' => 'required|max:12',
            'supportType' => 'required|max:225',
            'meetingDate' => 'required',
            'message' => 'required',
            'level' => 'required|max:225',
            'vendor_id' => 'required|max:10',
            'vendorUser_id' => 'required|max:10',
            'status' => 'required|max:10',
        ]);

        // dd($request->all());

        $meeting = $request->id
            ? Meetings::findOrFail($request->id)
            : new Meetings();

        $zoom = $this->createZoomMeeting(
            'Support Meeting - ' . $request->name,
            $request->meetingDate
        );

        $meeting->fill([
            'siteId' => $request->siteId,
            'name' => $request->name,
            'email' => $request->email,
            'course' => $request->course,
            'phone' => $request->phone,
            'supportType' => $request->supportType,
            'meetingDate' => $request->meetingDate,
            'meetingLink' => $zoom['join_url'] ?? null,
            'message' => $request->message,
            'level' => $request->level,
            'vendor_id' => $request->vendor_id,
            'vendorUser_id' => json_encode($request->vendorUser_id),
            'status' => $request->status,
        ]);
        $meeting->save();
        $vendorUser = Vendoruser::find($request->vendorUser_id);
        $ccmail = $request?->bccEmail;
            if ($vendorUser && !empty($vendorUser->email)) {
                Mail::send('emails.meeting', [
                    'meeting' => $meeting,
                    'vendorUser' => $vendorUser
                ], function ($mail) use ($vendorUser, $ccmail) {
                    $mail->to('amarjeetkushwaha379@gmail.com')
                        ->subject('Meeting Scheduled – Zoom Link');
                    if (!empty($ccmail)) {
                        $mail->cc($ccmail);
                    }
                });
            }

        // foreach ($request->vendorUser_id as $vendoruser) {
        //     $vendorUser = Vendoruser::find($vendoruser);
        //     if ($vendorUser && $vendorUser->email) {
        //         Mail::send('emails.meeting', [
        //             'meeting' => $meeting,
        //             'vendorUser' => $vendorUser
        //         ], function ($mail) use ($vendorUser) {
        //             $mail->to('amarjeetkushwaha379@gmail.com')
        //                 ->subject('Meeting Scheduled – Zoom Link');
        //         });
        //     }
        // }
        
        return redirect()->route('meeting.list')
            ->with('success', $request->id ? 'Meeting updated successfully!' : 'Meeting created successfully!');
    }

}
