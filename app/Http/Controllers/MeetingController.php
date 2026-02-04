<?php

namespace App\Http\Controllers;
use App\Models\Meetings;
// use App\Models\Role;

use App\Models\Vendor;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function meetinglist(){
        $meetings = Meetings::get();
        return view('meeting.index' ,compact('meetings'));
    }

    public function addmeting(){
        $meeting = null;
        $vendor = Vendor::where('status' ,1)->get();
        return view('meeting.add' ,compact('meeting' ,'vendor'));
    }
}
