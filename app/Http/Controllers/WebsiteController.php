<?php

namespace App\Http\Controllers;

use App\Models\Websites;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function websiteslist(Request $request)
    {
        $vendor = $request->id;
        return view('websites.index', compact('vendor'));
    }

    public function websitesdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Websites::select('*')->orderBy('id', 'DESC');

            
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

    public function editwebsites(Request $request , $id)
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

}
