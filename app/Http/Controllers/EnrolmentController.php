<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrolmentRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Enrolment;

class EnrolmentController extends Controller
{
    public function enrolmentlist()
    {
        $data = Enrolment::get();
        // dd($data);
        $vendor = Vendor::where('status', 1)->get();
        return view('enrolment.index', compact('data', 'vendor'));
    }

    public function insertenrolment(EnrolmentRequest $request)
    {
        // dd($request->all());
        try {
            if ($request->id) {
                $enrolment = Enrolment::where('id', $request->id)->first();
            } else {
                $enrolment = new Enrolment();
            }

            if ($request->hasFile('profile')) {

                if ($enrolment->profile && file_exists(public_path('enrolment/' . $enrolment->profile))) {
                    unlink(public_path('enrolment/' . $enrolment->profile));
                }

                $imageName = time() . rand(100, 999) . '.' . $request->profile->extension();
                $request->profile->move(public_path('enrolment'), $imageName);
                $enrolment->profile = $imageName;
            }

            $enrolment->student_name = $request->student_name;
            $enrolment->email = $request->email;
            $enrolment->address = $request->address;
            $enrolment->course_name = $request->course_name;
            $enrolment->phone = $request->phone;
            $enrolment->enrolled_at = $request->enrolled_at;
            $enrolment->status = $request->status;
            $enrolment->vendor_id = $request->vendor_id;
            $enrolment->vendor_user_id = $request->vendor_user_id;

            $enrolment->save();

            if ($request->id) {
                return redirect()->back()->with('success', 'Enrolment updated successfully!');
            } else {
                return redirect()->back()->with('success', 'Enrolment added successfully!');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function enrolmentedit(Request $request)
    {
        if ($request->id) {
            $enrolment = Enrolment::where('id', $request->id)->first();
            return response()->json($enrolment);

        } else {
            return response()->json('Something went wrong');
        }
    }

    public function deleteenrolmen(Request $request){
        if ($request->id) {
            $enrolment = Enrolment::where('id', $request->id)->first();
            $enrolment->delete();
            return redirect()->back()->with('success' ,'Enrolment deleted successfully!');

        } else {
            return redirect()->back()->with('error' ,'Something went wrong!');
        }
    }
}
