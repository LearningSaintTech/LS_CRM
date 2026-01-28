<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Vendor;
use App\Models\Websites;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function websiteslist(Request $request)
    {
        $vendor = $request->id;
        $this->setId($request);
        return view('websites.index', compact('vendor'));
    }

    public function setId(Request $request)
    {
        session(['vendor_id' => $request->id]);
    }

    public function websitesdata(Request $request)
    {
        $id = session('vendor_id');
        if ($request->ajax()) {
            $data = Websites::where('vendor_id', $id)->select('*')->orderBy('id', 'DESC');
            return datatables()->of($data)
                ->addColumn('status', function ($row) {
                    if ($row->status == '1') {
                        return '<span class="badge bg-success">Active</span>';
                    } else {
                        return '<span class="badge bg-danger">Inactive</span>';
                    }
                })

                ->addColumn('created_at', function ($row) {
                    return $row?->created_at->format('d M, Y');
                })

                ->addColumn('vendor', function ($row) {
                    return $row?->vendor?->name;
                })

                ->addColumn('url', function ($row) {
                    return '<a href="' . e($row->url) . '" target="_blank">' . e($row->url) . '</a>';
                })


                ->addColumn('action', function ($row) {
                    $edit = route('website.edit', [
                        'vendor' => $row?->vendor?->id,
                        'id' => $row->id,
                    ]);
                    $addUser = route('user.view', ['vendor_id' => $row->vendor_id]);
                    $statusText = $row->status == 1 ? 'Inactive' : 'Active';
                    return '
                            <div class="dropdown">
                                <button type="button"
                                    class="btn btn-sm btn-primary light btn-square"
                                    data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="' . $edit . '">Edit</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger delete-website"
                                        href="javascript:void(0)"
                                        data-id="' . $row->id . '">
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>';
                })


                ->rawColumns(['created_at', 'action', 'status', 'vendor', 'url'])
                ->make(true);

        }
    }

    public function addwebsites($vendor)
    {
        $website = null;
        $vendorId = $vendor ?? '';
        return view('websites.add', compact('website', 'vendorId'));
    }

    public function editwebsites(Request $request, $id)
    {
        $website = Websites::where('id', $id)->firstOrFail();
        return view('websites.add', [
            'website' => $website,
            'vendorId' => $request->query('vendor'),
        ]);
    }

    public function insertwebsite(Request $request)
    {
        try {
            $validated = $request->validate([
                'vendor_id' => 'required',
                'sitename' => 'required|string|min:3|max:255',
                'url' => 'required|url|max:255',
                'email' => 'required|email|max:100',
                'logoUrl' => 'nullable|string|max:100',
                'smtpEmail' => 'nullable|email|max:100',
                'smtpPassword' => 'nullable|string|max:100',
                'smtpHost' => 'nullable|string|max:100',
                'smtpPort' => 'nullable|integer',
                'ccEmail' => 'nullable|email|max:100',
                'bccEmail' => 'nullable|email|max:100',
                'certificateAuthority' => 'nullable|string|max:200',
                'certificateUrl' => 'nullable|url|max:200',
            ]);

            $website = Websites::updateOrCreate(
                [
                    'vendor_id' => $validated['vendor_id'],
                    'sitename' => $validated['sitename'],
                    'url' => $validated['url'],
                    'email' => $validated['email'],
                    'status' => 1,
                    'logoUrl' => $validated['logoUrl'] ?? null,
                    'smtpEmail' => $validated['smtpEmail'] ?? null,
                    'smtpPassword' => $validated['smtpPassword'] ?? null,
                    'smtpHost' => $validated['smtpHost'] ?? null,
                    'smtpPort' => $validated['smtpPort'] ?? null,
                    'ccEmail' => $validated['ccEmail'] ?? null,
                    'bccEmail' => $validated['bccEmail'] ?? null,
                    'certificateAuthority' => $validated['certificateAuthority'] ?? null,
                    'certificateUrl' => $validated['certificateUrl'] ?? null,
                ]
            );

            $message = $request->id
                ? 'Website updated successfully!'
                : 'Website added successfully!';

            return redirect()
                ->route('websites.list', ['id' => $request->vendor_id])
                ->with('success', $message);

        } catch (\Throwable $e) {
            Log::error('Website insert/update failed', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);
            return redirect()->back()->withInput()->with('error', 'Something went wrong. Please try again.');
        }
    }

    // course function start

    public function courselist(Request $request)
    {
        $vendor = $request->id;
        // dd($vendor);
        $this->setId($request);
        return view('websites.courseindex', compact('vendor'));
    }

    public function coursedata(Request $request)
    {
        $id = session('vendor_id');
        if ($request->ajax()) {
            $data = Course::where('vendor_id', $id)->select('*')->orderBy('id', 'DESC');
            return datatables()->of($data)
                ->addColumn('status', function ($row) {
                    if ($row->status == '1') {
                        return '<span class="badge bg-success">Active</span>';
                    } else {
                        return '<span class="badge bg-danger">Inactive</span>';
                    }
                })

                ->addColumn('created_at', function ($row) {
                    return $row?->created_at->format('d M, Y');
                })

                ->addColumn('vendor', function ($row) {
                    return $row?->vendor?->name;
                })

                ->addColumn('url', function ($row) {
                    return '<a href="' . e($row->url) . '" target="_blank">' . e($row->url) . '</a>';
                })


                ->addColumn('action', function ($row) {
                    $edit = route('website.edit', [
                        'vendor' => $row?->vendor?->id,
                        'id' => $row->id,
                    ]);
                    $addUser = route('user.view', ['vendor_id' => $row->vendor_id]);
                    $statusText = $row->status == 1 ? 'Inactive' : 'Active';
                    return '<div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-primary light btn-square"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item edit-course" data-url="' . route('course.edit', $row->id) . '" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" data-id=" ' . $row->id . '">Edit</a></li>
                                        
                                        <a class="dropdown-item toggle-status"
                                            href="javascript:void(0);"
                                            data-id="{{ $row->id }}"
                                            data-url="' . route('course.delete', $row->id) . '"
                                            data-status="' . $row->status . '">
                                             Delete
                                            </a>
                                    </ul>
                                </div>';
                })

                ->rawColumns(['created_at', 'action', 'status', 'vendor', 'url'])
                ->make(true);

        }
    }

    public function courseinsert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'url' => 'required|max:200',
            'vendor_id' => 'required|max:10',
            'price' => 'required|max:20',
        ]);
        if ($request->course_id) {
            $course = Course::where('id', $request->course_id)->first();
        } else {
            $course = new Course();
        }
        $course->name = $request->name;
        $course->url = $request->url;
        $course->vendor_id = $request->vendor_id;
        $course->name = $request->name;
        $course->price = $request->price;
        $course->status = $request->status;
        $course->save();

        if ($request->course_id) {
            return redirect()->back()->with('success', 'Course updated successfully!');
        } else {
            return redirect()->back()->with('success', 'Course added successfully!');

        }
    }

    public function coursedit($id)
    {
        $user = Course::findOrFail($id);
        // dd($id);
        return response()->json([
            'id' => $user->id,
            'url' => $user->url,
            'price' => $user->price,
            'vendor_id' => $user->vendor_id,
            'status' => $user->status,
            'name' => $user->name,
        ]);
    }

    public function coursedelete($id)
    {   
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('success', 'Course deleted successfully!');
    }

}
