@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Vendor</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor Add</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>
    <div class="card h-auto container">
        <div class="card-body table-card-body pt-0 px-0 pb-1">

            <form action="{{ route('insert.vender') }}" method="post" enctype="multipart/form-data" onSubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <input type="hidden" name="id" value="{{ $vender?->id }}">
                            <label for="" class="form-label"> Name<strong class="text-danger"> * </strong>
                            </label>
                            <input type="text" name="name" value="{{ old('name' , $vender?->name) }}" class="form-control" id="" placeholder="Name"
                                required maxlength="100">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label"> Email <strong class="text-danger"> * </strong>
                            </label>
                            <input type="email" name="email" class="form-control" value="{{ old('email' , $vender?->email) }}" placeholder="Email" required
                                maxlength="100" @if($vender?->email)disabled @else @endif>
                                @if($vender?->email)
                                    <input type="hidden" name="email" id="">
                                @endif
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Phone <strong class="text-danger"> * </strong>
                            </label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone' , $vender?->phone) }}" maxlength="15" required>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label"> Company Name <strong class="text-danger"> *
                                </strong> </label>
                            <input type="text" name="company_name"  class="form-control" id=""
                                placeholder="Company Name" value="{{ old('company_name' , $vender?->company_name) }}" maxlength="255" required>
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label"> GST Number (Optional)</label>
                            <input type="text" name="gst_number" value="{{ old('gst_number' , $vender?->gst_number) }}" class="form-control" id=""
                                placeholder="GDST Number" maxlength="50">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Pan_Number (Optional) </label>
                            <input type="text" name="pan_number" value="{{ old('pan_number' , $vender?->pan_number) }}" class="form-control" placeholder="Pan Number"
                                maxlength="20">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Address (Optional)</label>
                            <input type="text" name="address" value="{{ old('address' , $vender?->address) }}" class="form-control" placeholder="Address">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">City (Optional)</label>
                            <input type="text" name="city" value="{{ old('city' , $vender?->city) }}" class="form-control" placeholder="City"
                                maxlength="225">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label"> State (Optional) </label>
                            <input type="text" name="state"  value="{{ old('state' , $vender?->state) }}" class="form-control" placeholder="State" id=""
                                maxlength="225">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Pincode (Optional) </label>
                            <input type="text" class="form-control" value="{{ old('pincode' , $vender?->pincode) }}" name="pincode" placeholder="Pincode"
                                maxlength="10">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Opening Balance</label>
                            <input type="text" name="opening_balance" value="{{ old('opening_balance' , $vender?->opening_balance) }}" class="form-control"
                                placeholder="Opening Balance" id="">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Profile_Image</label>
                            <input type="file" class="form-control" name="profile_image" accept="image/*">

                            <div>
                                <input type="image" class="m-3" src="{{ asset('vendor/' .''. $vender?->profile_image) }}" alt="" width="70" height="70" style="border-radius: 50px;">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-secondary btn-sm" id="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>


@include('common.footer');
