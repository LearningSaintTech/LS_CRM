<div class="offcanvas offcanvas-end custom-offcanvas" tabindex="-1" id="offcanvasExample">
    <div class="offcanvas-body">
        <form action="{{ route('insert.enrolment') }}" method="post" enctype="multipart/form-data"
            onSubmit="document.getElementById('submit').disabled=true;">
            @csrf
            <div class="offcanvas-header pb-0">
                <h2 class="modal-title fs-5" id="#gridSystemModal">Add Enrolment</h2>
                <button type="reset" class="btn btn-square btn-danger light btn-sm ms-auto"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="mb-3 mt-4">
                <label class="form-label">Profile Picture</label>
                <div class="dropzone">
                    <div class="dropzone-content">
                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M20.5 20V35" stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M34.4833 30.6501C36.1088 29.7638 37.393 28.3615 38.1331 26.6644C38.8731 24.9673 39.027 23.0721 38.5703 21.2779C38.1136 19.4836 37.0724 17.8926 35.6111 16.7558C34.1497 15.619 32.3514 15.0013 30.4999 15.0001H28.3999C27.8955 13.0488 26.9552 11.2373 25.6498 9.70171C24.3445 8.16614 22.708 6.94647 20.8634 6.1344C19.0189 5.32233 17.0142 4.93899 15.0001 5.01319C12.9861 5.0874 11.015 5.61722 9.23523 6.56283C7.45541 7.50844 5.91312 8.84523 4.7243 10.4727C3.53549 12.1002 2.73108 13.9759 2.37157 15.959C2.01205 17.9421 2.10678 19.9809 2.64862 21.9222C3.19047 23.8634 4.16534 25.6565 5.49994 27.1667"
                                stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <div class="fallback">
                            <input name="profile" accept="image/*" type="file">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 mb-3">
                    <input type="hidden" name="id" id="enrolment_id">
                    <label for="exampleFormControlInput2" class="form-label">Student Name<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="student_name" id="student_name"
                        class="form-control" id="student_name" placeholder="Name" required maxlength="100">
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Email<span
                            class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                        required maxlength="100">
                </div>

                <div class="col-xl-6 mb-3">
                    <label for="exampleFormControlInput88" class="form-label">Mobile<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone"
                        maxlength="12" required>
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Status<span class="text-danger">*</span></label>
                    <select name="status" id="status" class="selectpicker form-select">
                        <option data-display="Select">Please select</option>
                        <option value="1">Active</option>
                        <option value="0">In-active</option>
                    </select>
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <input type="text" name="course_name" class="form-control" id="course_name"
                        placeholder="Course Name" maxlength="255" required>
                </div>

                <div class="col-xl-6 mb-3">
                    <label for="defaultFlatpickr" class="form-label">Vendor Name<span
                            class="text-danger"></span></label>
                    <select name="vendor_id" id="vendor_id" class="form-select" required>
                        <option value="" selected disabled> Please select vendor</option>
                        @foreach ($vendor as $vendors)
                            <option value="{{ $vendors?->id }}">{{ $vendors?->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="" class="form-label"> Vendor User Name </label>
                    <select name="vendor_user_id" class="form-select" id="vendorUser_id" required>
                        <option value="" disabled selected> Select vendor user </option>
                    </select>
                </div>

                <div class="col-xl-6 mb-3">
                    <label for="" class="form-label">Enrolled Date</label>
                    <input type="datetime-local" name="enrolled_at" id="enrolled_at" class="form-control" required>
                </div>

                <div class="col-xl-12 mb-3">
                    <label for="" class="form-label">Address (Optional)</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                </div>
            </div>
            <div class="clearfix">
                <button class="btn btn-danger light" type="reset">Cancel</button>
                <button class="btn btn-primary ms-2" type="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
