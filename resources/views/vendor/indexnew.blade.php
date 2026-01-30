@include('common.header')
<main class="content-body">
    <div class="page-title">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> Vendor </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 d-sm-flex d-block align-items-center">
                        <h4 class="card-title">Vendor</h4>
                        <div class="clearfix">
                            <div class="d-inline-block m-1" id="employeesTableExcelBTN"></div>
                            <a class="btn btn-primary btn-sm m-1" data-bs-toggle="offcanvas" href="#offcanvasExample"
                                role="button" aria-controls="offcanvasExample">+ Add Vendor</a>
                            <button type="button" class="btn btn-secondary btn-sm m-1" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">+ Invite Vendor</button>
                        </div>
                    </div>
                    <div class="card-header d-block pb-2">
                        <form class="row align-items-end">

                            <div class="col-xxl-2 col-xl-3 col-sm-6 col-lg-4 mb-3">
                                <label class="form-label">Search</label>
                                <input type="text" class="form-control" id="searchFilter">
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-sm-6 col-lg-4 mb-3">
                                <label class="form-label">Status</label>
                                <select id="statusFilter" class="selectpicker form-select">
                                    <option value="">All</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                    {{-- <option value="Pending">Pending</option> --}}
                                </select>
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-sm-6 col-lg-4 mb-3">
                                <label class="form-label">Department</label>
                                <select id="departmentFilter" class="selectpicker form-select">
                                    <option value="">All</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Web Designer">Web Designer</option>
                                </select>
                            </div>
                            <div class="col-xxl-2 col-xl-3 col-sm-6 col-lg-4 mb-3">
                                <label class="form-label">Gender</label>
                                <select id="genderFilter" class="selectpicker form-select">
                                    <option value="">All</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-xxl-2 col-xl-3 col-sm-6 col-lg-4 mb-3">
                                <label class="form-label">Location</label>
                                <select id="locationFilter" class="selectpicker form-select">
                                    <option value="">All</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Bengaluru">Bengaluru</option>
                                    <option value="Hyderabad">Hyderabad</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Ahmedabad">Ahmedabad</option>
                                    <option value="Kolkata">Kolkata</option>
                                    <option value="Chennai">Chennai</option>
                                </select>
                            </div>
                            <div class="col-xxl-2 col-xl-3 col-sm-6 col-lg-4 mb-3">
                                <button id="applyFilter" class="btn btn-primary" type="button">Apply</button>
                                <button id="resetFilter" class="btn btn-danger light ms-2" type="button">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <table id="employeesTable" class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th class="mw-120">Vendor ID</th>
                                        <th class="mw-150">Vendor Name</th>
                                        <th class="mw-150">Company Name</th>
                                        <th class="mw-150">Email </th>
                                        <th class="mw-150">Contact </th>
                                        <th class="mw-100">GST Number</th>
                                        <th class="mw-100">Location</th>
                                        <th class="mw-100">Status</th>
                                        <th class="mw-100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $datas)
                                        <tr>
                                            <td><span>{{ $datas?->id }}</span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <img src="{{ asset('vendor/' . ($datas?->profile_image ?? 'default.png')) }}"
                                                        class="avatar avatar-sm me-2" alt="">
                                                    <div class="clearfix">
                                                        <h6 class="mb-0">{{ $datas?->name }}</h6>
                                                        {{-- <small>{{ $datas?->company_name }}</small> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span>{{ $datas?->company_name }}</span></td>
                                            <td><span class="text-primary">{{ $datas?->email }}</span></td>
                                            <td><span>{{ $datas?->phone }}</span></td>
                                            <td><span>{{ $datas?->gst_number }}</span></td>
                                            <td><span>{{ $datas?->address }}</span></td>
                                            <td><span class="badge badge-success light">
                                                    @if ($datas?->status == 1)
                                                        Active
                                                    @else
                                                        In-Active
                                                    @endif
                                                </span></td>
                                            <td class="">
                                                <div class="dropdown">
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary light btn-square"
                                                        data-bs-toggle="dropdown">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('vendor.edit', ['id' => $datas->id]) }}">Edit</a>
                                                        </li>
                                                        {{-- <li><a class="dropdown-item"
                                                                href="javascript:void(0);">View</a></li> --}}
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('user.view', ['id' => $datas->id]) }}">View
                                                                User</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('websites.list', ['id' => $datas->id]) }}">View
                                                                Websites</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('course.list', ['id' => $datas->id]) }}">View
                                                                Course</a></li>

                                                        <li>
                                                            <a class="dropdown-item toggle-status"
                                                                href="javascript:void(0);"
                                                                data-id="{{ $datas->id }}"
                                                                data-url="{{ route('vendor.status', $datas->id) }}"
                                                                data-status="{{ $datas->status }}">
                                                                @if ($datas?->status == 1)
                                                                    Active
                                                                @else
                                                                    In-Active
                                                                @endif
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a class="dropdown-item text-danger"
                                                                href="javascript:void(0);">
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-end custom-offcanvas" tabindex="-1" id="offcanvasExample">
                <div class="offcanvas-header pb-0">
                    <h2 class="modal-title fs-5" id="#gridSystemModal">Add Vendor</h2>
                    <button type="button" class="btn btn-square btn-danger light btn-sm ms-auto"
                        data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <form action="{{ route('insert.vender') }}" method="post" enctype="multipart/form-data"
                        onSubmit="document.getElementById('submit').disabled=true;">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Profile Picture</label>
                            <div class="dropzone">
                                <div class="dropzone-content">
                                    <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M20.5 20V35" stroke="#DADADA" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M34.4833 30.6501C36.1088 29.7638 37.393 28.3615 38.1331 26.6644C38.8731 24.9673 39.027 23.0721 38.5703 21.2779C38.1136 19.4836 37.0724 17.8926 35.6111 16.7558C34.1497 15.619 32.3514 15.0013 30.4999 15.0001H28.3999C27.8955 13.0488 26.9552 11.2373 25.6498 9.70171C24.3445 8.16614 22.708 6.94647 20.8634 6.1344C19.0189 5.32233 17.0142 4.93899 15.0001 5.01319C12.9861 5.0874 11.015 5.61722 9.23523 6.56283C7.45541 7.50844 5.91312 8.84523 4.7243 10.4727C3.53549 12.1002 2.73108 13.9759 2.37157 15.959C2.01205 17.9421 2.10678 19.9809 2.64862 21.9222C3.19047 23.8634 4.16534 25.6565 5.49994 27.1667"
                                            stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="fallback">
                                        <input name="profile_image" accept="image/*" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 mb-3">
                                <input type="hidden" name="id" value="{{ $vender?->id }}">
                                <label for="exampleFormControlInput2" class="form-label">Vendor Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name', $vender?->name) }}" class="form-control" id=""
                                    placeholder="Name" required maxlength="100">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label for="exampleFormControlInput3" class="form-label">Vendor Email<span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $vender?->email) }}" placeholder="Email" required
                                    maxlength="100">
                            </div>

                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Status<span class="text-danger">*</span></label>
                                <select name="status" class="selectpicker form-select">
                                    <option data-display="Select">Please select</option>
                                    <option value="1">Active</option>
                                    <option value="0">In-active</option>
                                </select>
                            </div>

                            <div class="col-xl-6 mb-3">
                                <label for="exampleFormControlInput88" class="form-label">Mobile<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Phone" name="phone"
                                    value="{{ old('phone', $vender?->phone) }}" maxlength="15" required>
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Company Name<span class="text-danger">*</span></label>
                                <input type="text" name="company_name" class="form-control" id=""
                                    placeholder="Company Name"
                                    value="{{ old('company_name', $vender?->company_name) }}" maxlength="255"
                                    required>
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label for="defaultFlatpickr" class="form-label">GST Number (Optional)<span
                                        class="text-danger"></span></label>
                                <input type="text" name="gst_number"
                                    value="{{ old('gst_number', $vender?->gst_number) }}" class="form-control"
                                    id="" placeholder="GDST Number" maxlength="50">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label for="" class="form-label">Pan_Number (Optional) </label>
                                <input type="text" name="pan_number"
                                    value="{{ old('pan_number', $vender?->pan_number) }}" class="form-control"
                                    placeholder="Pan Number" maxlength="20">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label for="" class="form-label">Address (Optional)</label>
                                <input type="text" name="address" value="{{ old('address', $vender?->address) }}"
                                    class="form-control" placeholder="Address">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label for="" class="form-label">City (Optional)</label>
                                <input type="text" name="city" value="{{ old('city', $vender?->city) }}"
                                    class="form-control" placeholder="City" maxlength="225">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label for="" class="form-label"> State (Optional) </label>
                                <input type="text" name="state" value="{{ old('state', $vender?->state) }}"
                                    class="form-control" placeholder="State" id="" maxlength="225">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="" class="form-label">Pincode (Optional) </label>
                                <input type="text" class="form-control"
                                    value="{{ old('pincode', $vender?->pincode) }}" name="pincode"
                                    placeholder="Pincode" maxlength="10">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="" class="form-label">Opening Balance</label>
                                <input type="text" name="opening_balance"
                                    value="{{ old('opening_balance', $vender?->opening_balance) }}"
                                    class="form-control" placeholder="Opening Balance" id="">
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-danger light">Cancel</button>
                            <button class="btn btn-primary ms-2" type="submit" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</main>

@include('common.footer')

<script>
    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let vendorId = $(this).data('id');
        let currentStatus = $(this).data('status');
        let actionText = currentStatus == 1 ? 'inactive' : 'active';

        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to ${actionText} this vendor?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, ' + actionText,
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
</script>
