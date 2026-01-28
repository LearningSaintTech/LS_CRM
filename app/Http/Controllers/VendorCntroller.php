<?php

namespace App\Http\Controllers;
use App\Models\{Vendor, User, Vendoruser};
use Illuminate\Support\Facades\DB;
use Nette\Schema\Helpers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\VendorRequest;
use App\Helpers\UserHelper;
use App\Mail\UserCredentialsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class VendorCntroller extends Controller
{
    protected $id;
    public function vendorlist()
    {
        return view('vendor.index');
    }


    public function vendordata(Request $request)
    {
        if ($request->ajax()) {
            $data = Vendor::select('*')->orderBy('id', 'DESC');
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

                ->addColumn('action', function ($row) {
                    $edit = route('vendor.edit', ['id', $row->id]);
                    $adduser = route('user.view', ['id', $row->id]);
                    if ($row->status == 1) {
                        $status = 'Inactive';
                    } else {
                        $status = 'Active';
                    }
                    return '<div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-primary light btn-square"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="' . route('vendor.edit', ['id' => $row->id]) . '">Edit</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">View</a></li>
                                        <li><a class="dropdown-item" href="' . route('user.view', ['id' => $row->id]) . '">View User</a></li>
                                        <li><a class="dropdown-item" href="' . route('websites.list', ['id' => $row->id]) . '">View Websites</a></li>

                                        <li>
                                            <a class="dropdown-item toggle-status"
                                            href="javascript:void(0);"
                                            data-id="{{ $row->id }}"
                                            data-url="' . route('vendor.status', $row->id) . '"
                                            data-status="' . $row->status . '">
                                             ' . $status . '
                                            </a>
                                        </li>

                                        <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </li>   
                                    </ul>
                                </div>';
                })->rawColumns(['created_at', 'action', 'status'])->make(true);
        }
    }

    public function toggleStatus($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->status = $vendor->status ? 0 : 1;
        $vendor->save();
        return back()->with('success', 'Vendor status updated successfully');
    }

    public function userview(Request $request)
    {
        $vendor = Vendor::where('id', $request?->id)->first();
        $this->setId($request);
        return view('vendor.vendoruser', compact('vendor'));
    }


    public function vendoruserinsert(Request $request)
    {
        $id = $request->vendor_user_id;
        if ($id) {
            $validatedData = $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|max:12',
                'email' => 'required|max:70',
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|max:12',
                'email' => 'required|max:70|unique:users,email',
            ]);
        }

        DB::beginTransaction();
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        try {
            if ($id) {
                $user = Vendoruser::where('id', $id)->first();
            } else {
                $user = new Vendoruser();
                $random_nmber = random_int(100000, 999999);
                $name = substr($request?->name, 0, 3);
                $password = $name . '' . $random_nmber;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->vendor_id = $request->vendor_id;
            $user->description = $request->description;
            $user->created_by = Auth::user()->id;

            // if (!empty($input['password'])) {
            //     $user->password = $input['password'];
            // }

            $user->status = $request->status;
            $user->save();
            DB::commit();

            if ($request?->vendor_user_id) {
                $user = UserHelper::update_user($user);
            } else {
                $user = UserHelper::store_user($user, $password, $role = 'vendor');
                if ($user) {
                    Mail::to($user->email)->send(new UserCredentialsMail($user, $password));
                }
            }
            // session()->flash('test', 'working');
            // dd(session()->all());


            return redirect()->route('user.view', ['id' => $request->vendor_id])->with('success', 'Vendor user saved successfully!');
        } catch (\Exception $e) {
            // session(['error' => 'Error updating user: ' . $e->getMessage()]);
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Error saving data: ' . $e->getMessage())->withInput();
        }
    }

    public function setId(Request $request)
    {
        session(['vendor_id' => $request->id]);
    }

    public function addvendor()
    {
        $vender = null;
        return view('vendor.add', compact('vender'));
    }

    public function vendoredit(Request $request)
    {
        $vender = Vendor::where('id', $request->id)->first();

        return view('vendor.add', compact('vender'));
    }

    public function vendoruserdata(Request $request)
    {

        $id = session('vendor_id');
        //   dd($id);
        if ($request->ajax()) {
            $data = Vendoruser::where('vendor_id', $id)->select('*')->orderBy('id', 'DESC');
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

                ->addColumn('action', function ($row) {
                    $edit = route('vendor.edit', ['id', $row->id]);
                    $adduser = route('user.view', ['id', $row->id]);
                    if ($row->status == 1) {
                        $status = 'Inactive';
                    } else {
                        $status = 'Active';
                    }
                    return '<div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-primary light btn-square"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item edit-vendor-user" data-url="' . route('vendoruser.edit', $row->id) . '" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" data-id=" ' . $row->id . '">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </li>   
                                    </ul>
                                </div>';
                })
                ->rawColumns(['created_at', 'action', 'status'])
                ->make(true);
        }
    }

    public function vendoreuserdit($id)
    {
        $user = Vendoruser::findOrFail($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'status' => $user->status,
            'description' => $user->description,
        ]);
    }


    public function insertvender(VendorRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            if ($request->id) {
                $vendor = Vendor::where('id', $request->id)->first();
            } else {
                $vendor = new Vendor();
                $random_nmber = random_int(100000, 999999);
                $name = substr($request?->name, 0, 3);
                $password = $name . '' . $random_nmber;
            }
            if ($request->hasFile('profile_image')) {
                if ($vendor->profile_image && file_exists(public_path('vendor/' . $vendor->profile_image))) {
                    unlink(public_path('vendor/' . $vendor->profile_image));
                }
                $imageName = time() . rand(100, 999) . '.' . $request->profile_image->extension();
                $request->profile_image->move(public_path('vendor'), $imageName);
                $vendor->profile_image = $imageName;
            }
            $vendor->fill([
                'name' => $request->name,
                'phone' => $request?->phone,
                'email' => $request?->email,
                'company_name' => $request?->company_name,
                'gst_number' => $request?->gst_number,
                'pan_number' => $request?->pan_number,
                'address' => $request?->address,
                'city' => $request?->city,
                'state' => $request?->state,
                'pincode' => $request?->pincode,
                'opening_balance' => $request?->opening_balance,
                'status' => 1,
                'registered_at' => now(),
            ]);
            $vendor->save();
            DB::commit();
            if ($request?->id) {
                $user = UserHelper::update_user($vendor);
            } else {
                $user = UserHelper::store_user($vendor, $password, $role = 'vendor');
                if ($user) {
                    Mail::to($user->email)->send(new UserCredentialsMail($user, $password));
                }
            }
            return $this->alertRedirect(
                'vendor.list',
                'success',
                'Vendor saved successfully!'
            );

        } catch (\Exception $e) {
            // dd($e);  
            DB::rollBack();
            return $this->alertRedirect(
                'vendor.list',
                'error',
                'Something went wrong!'
            );
        }
    }
}
