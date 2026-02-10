@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Meeting</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Meeting Add</li>
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

            <form action="{{ route('insert.meeting') }}" method="post" enctype="multipart/form-data"
                onSubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="" class="form-label">Vendor Name</label>
                            <select name="vendor_id" id="vendor_id" class="form-select">
                                <option value="" selected disabled>Please select vendor</option>
                                @foreach ($vendor as $vendors)
                                    <option value="{{ $vendors?->id }}">{{ $vendors?->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <input type="hidden" name="id" value="{{ $meeting?->id }}">
                            <label for="" class="form-label"> Site Name<strong class="text-danger"> * </strong>
                            </label>
                            <select name="siteId" class="form-select" id="website">

                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label"> Meeting Host<strong class="text-danger"> *
                                </strong>
                            </label>
                            <select name="vendorUser_id" class="form-select" id="vendorUser_id">

                            </select>
                        </div>


                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="" class="form-label">CC Email</label>
                            <input type="email" name="bccEmail" value="{{ old('bccEmail', $meeting?->bccEmail) }}"
                                class="form-control" placeholder="CC Email" id="" maxlength="100">
                        </div>


                        <div class="col-md-4">
                            <label for="" class="form-label"> Name <strong class="text-danger"> * </strong>
                            </label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $meeting?->name) }}" placeholder="Name" required maxlength="100">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label"> Support Type (Optional) </label>
                            <input type="text" name="supportType"
                                value="{{ old('supportType', $meeting?->supportType) }}" class="form-control"
                                placeholder="Support Type" maxlength="200">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="" class="form-label">Meeting Date</label>
                            <input type="datetime-local" name="meetingDate"
                                value="{{ old('meetingDate', $meeting?->meetingDate) }}" class="form-control">
                        </div>

                        {{-- <div class="col-md-4">
                            <label for="" class="form-label">Meeting Link</label>
                            <input type="text" name="meetingLink"
                                value="{{ old('meetingLink', $meeting?->meetingLink) }}" class="form-control"
                                placeholder="Meeting Link" maxlength="225">
                        </div> --}}

                        <div class="col-md-4">
                            <label for="" class="form-label"> Phone </label>
                            <input type="text" name="phone" value="{{ old('phone', $meeting?->phone) }}"
                                class="form-control" id="" placeholder="Phone" maxlength="12">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Message (Optional) </label>
                            <input type="text" class="form-control"
                                value="{{ old('message', $meeting?->message) }}" name="message"
                                placeholder="Message">
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        
                        <div class="col-md-4">
                            <label for="" class="form-label"> Course <strong class="text-danger"> *
                                </strong> </label>
                            <input type="text" name="course" class="form-control" id=""
                                placeholder="Course" value="{{ old('course', $meeting?->course) }}" maxlength="255"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Level</label>
                            <input type="text" name="level" value="{{ old('level', $meeting?->level) }}"
                                class="form-control" placeholder="Level" id="" maxlength="200">
                        </div>


                        <div class="col-md-4">
                            <label for="" class="form-label">Status</label>
                            <select name="status" id="" class="form-select">
                                <option value="" selected disabled>Please select status</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
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


<script>
    $('#vendor_id').on('change', function() {

        let vendorId = $(this).val();

        $('#website').html('<option value="">Loading...</option>');
        $('#vendorUser_id').html('<option value="">Loading...</option>');

        if (!vendorId) {
            $('#website').html('<option value="">Select Website</option>');
            $('#vendorUser_id').html('<option value="">Select Vendor User</option>');
            return;
        }

        $.ajax({
            url: "{{ route('get.websites.vendoruser') }}",
            type: "GET",
            data: {
                vendor_id: vendorId
            },
            success: function(res) {

                console.log(res); // DEBUG

                /* -------- Websites -------- */
                let websiteOptions = '<option value="">Select Website</option>';
                res.websites.forEach(site => {
                    websiteOptions += `
                    <option value="${site.id}">
                        ${site.sitename}
                    </option>`;
                });
                $('#website').html(websiteOptions);

                /* -------- Vendor Users -------- */
                let vendorOptions = '<option value="">Select Vendor User</option>';
                res.vendor_users.forEach(user => {
                    vendorOptions += `
                    <option value="${user.id}">
                        ${user.name}
                    </option>`;
                });
                $('#vendorUser_id').html(vendorOptions);
            }
        });
    });
</script>
