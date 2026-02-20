@include('common.header')

<style>
    /* .card-profile {
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border: none;
    } */

    /* Banner */
    .cover-photo {
        height: 260px;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url('https://t3.ftcdn.net/jpg/04/42/44/98/360_F_442449827_ispo2oI83ffX0TSax4Pgdd7xkqCA5ThA.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
    }

    /* Logo on banner */
    .banner-logo {
        position: absolute;
        top: 20px;
        left: 30px;
    }

    .banner-logo img {
        height: 50px;
    }

    /* Profile Image */
    .profile-photo img {
        width: 130px;
        height: 121px;
        object-fit: cover;
        margin-top: 13px;
        background: #e50022;
        padding: 5px;
    }

    /* Name Styling */
    .card-profile h5 {
        font-weight: 600;
    }

    .card-profile span {
        font-size: 14px;
        color: #6c757d;
    }
</style>

<div id="main-wrapper">
    <main class="content-body">
        <div class="page-title">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Enrolment</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Student Enrolment</li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-profile card card-body p-0 pb-3">
                        <!-- Banner Section -->
                        <div class="cover-photo rounded-top">
                            <div class="banner-logo">

                            </div>
                        </div>


                        <div class="p-sm-4 p-3 d-sm-flex w-100 align-items-center">
                            <div class="profile-photo me-sm-4 text-center">
                                <img src="{{ asset('assets/images/profile/profile.png') }}"
                                    class="img-fluid rounded-circle border border-4 border-white" alt="">
                            </div>

                            <div class="d-flex w-100 justify-content-between align-items-center flex-wrap">

                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <h4 class="mb-1">Mitchell C. Shay</h4>
                                        <span>UX / UI Designer</span>
                                    </div>
                                </div>

                                <div class="dropdown">
                                    <button class="btn btn-sm btn-primary shadow-sm" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">

                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-user-circle text-primary me-2"></i> View Profile
                                            </a>
                                        </li>

                                        <li><a class="dropdown-item" href="#">
                                                <i class="fa fa-users text-primary me-2"></i> Add to Friends
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-ban text-danger me-2"></i> Block
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-xxl-4">
                    <div class="row">
                        <!-- Start - Profile Stats -->
                        <div class="col-xl-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <!-- Header Section -->
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <h4 class="fw-bold mb-1">Student Enrolment Details</h4>
                                            <span class="text-muted">Complete student profile information</span>
                                        </div>

                                        <span class="badge badge-success light fs-6 px-3 py-2">
                                            Active
                                        </span>
                                    </div>

                                    <div class="row g-4 text-center mb-4">
                                        <div class="col-md-3 col-6">
                                            <span class="h5 fw-bold text-primary d-block">ENR-145</span>
                                            <span class="text-muted">Enrolment ID</span>
                                        </div>

                                        <div class="col-md-3 col-6">
                                            <span class="h5 fw-bold d-block">John Doe</span>
                                            <span class="text-muted">Student Name</span>
                                        </div>

                                        <div class="col-md-3 col-6">
                                            <span class="h5 fw-bold text-success d-block">BCA</span>
                                            <span class="text-muted">Course</span>
                                        </div>

                                        <div class="col-md-3 col-6">
                                            <span class="h5 fw-bold text-warning d-block">Semester 3</span>
                                            <span class="text-muted">Current Semester</span>
                                        </div>

                                    </div>

                                    <hr>

                                    <!-- Financial Info -->
                                    <div class="row g-4 text-center mb-4">

                                        <div class="col-md-4 col-6">
                                            <span class="h5 fw-bold text-dark d-block">₹ 50,000</span>
                                            <span class="text-muted">Total Fees</span>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <span class="h5 fw-bold text-success d-block">₹ 35,000</span>
                                            <span class="text-muted">Paid Amount</span>
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <span class="h5 fw-bold text-danger d-block">₹ 15,000</span>
                                            <span class="text-muted">Pending Amount</span>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row g-4">
                                        <div class="col-md-4">
                                            <span class="fw-bold d-block">Email</span>
                                            <span class="text-muted">student@email.com</span>
                                        </div>

                                        <div class="col-md-4">
                                            <span class="fw-bold d-block">Mobile</span>
                                            <span class="text-muted">+91 9876543210</span>
                                        </div>

                                        <div class="col-md-4">
                                            <span class="fw-bold d-block">Admission Date</span>
                                            <span class="text-muted">12 Jan 2025</span>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="mt-4 text-end">
                                        <a href="javascript:void();" class="btn btn-outline-primary me-2">
                                            Edit Details
                                        </a>

                                        <a href="javascript:void();" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#sendMessageModal">
                                            Send Message
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start - Profile Feed -->
                <div class="col-xl-8 col-xxl-8">

                    <div class="card h-auto">
                        <div class="card-header">
                            <ul class="nav nav-underline card-header-tabs" id="nav-tab" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" id="underline-Posts-tab" data-bs-toggle="tab"
                                        data-bs-target="#underline-Posts" type="button" role="tab"
                                        aria-controls="underline-Posts" aria-selected="true">Status Update</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="underline-about-tab" data-bs-toggle="tab"
                                        data-bs-target="#underline-about" type="button" role="tab"
                                        aria-controls="underline-about" aria-selected="false">About Me</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="underline-setting-tab" data-bs-toggle="tab"
                                        data-bs-target="#underline-setting" type="button" role="tab"
                                        aria-controls="underline-setting" aria-selected="false">History</button>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="underline-tabContent">

                                <div class="tab-pane fade show active" id="underline-Posts" role="tabpanel"
                                    aria-labelledby="underline-Posts-tab" tabindex="0">
                                    <div class="clearfix mb-4">
                                        <h3>Status Update</h3>
                                        <select name="status" id="" class="form-select mb-3">
                                            <option value="">Please select status</option>
                                            <option value="Not Interested">Not Interested</option>
                                            <option value="HOT">HOT</option>
                                            <option value="COLD">COLD</option>
                                            <option value="DND">DND</option>
                                        </select>
                                        <textarea name="textarea" id="textarea" rows="2" class="form-control"
                                            placeholder="Please Enter the resion for status update...."></textarea>
                                        <div class="mt-3">
                                            {{-- <a href="javascript:void(0);"
                                                class="btn btn-square btn-primary light me-1" data-bs-toggle="modal"
                                                data-bs-target="#linkModal">
                                                <i class="fa fa-link"></i>
                                            </a> --}}
                                            {{-- <a href="javascript:void(0);"
                                                class="btn btn-square btn-primary light me-1" data-bs-toggle="modal"
                                                data-bs-target="#cameraModal">
                                                <i class="fa fa-camera"></i>
                                            </a> --}}
                                            <a href="javascript:void(0);" class="btn btn-primary me-1"
                                                data-bs-toggle="modal" data-bs-target="#postModal">Update</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="clearfix mb-4">
                                        <h3>Add Remark</h3>

                                        <textarea name="textarea" id="textarea" rows="2" class="form-control" placeholder="Enter Remarks Test..."></textarea>
                                        <div class="mt-3">

                                            <a href="javascript:void(0);" class="btn btn-primary me-1"
                                                data-bs-toggle="modal" data-bs-target="#postModal">Add Remark</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="underline-about" role="tabpanel"
                                    aria-labelledby="underline-about-tab" tabindex="0">
                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary">About Me</h4>
                                        <p class="mb-2">A wonderful serenity has taken possession of my entire soul,
                                            like these sweet mornings of spring which I enjoy with my whole heart. I am
                                            alone, and feel the charm of existence was created for the bliss of souls
                                            like mine.I am so happy, my dear friend, so absorbed in the exquisite sense
                                            of mere tranquil existence, that I neglect my talents.</p>
                                        <p>A collection of textile samples lay spread out on the table - Samsa was a
                                            travelling salesman - and above it there hung a picture that he had recently
                                            cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                    </div>
                                    <div class="py-3 border-top border-bottom">
                                        <h4 class="text-primary mb-2">Skills</h4>
                                        <a href="javascript:void();;"
                                            class="btn btn-primary light btn-sm mb-1">Admin</a>
                                        <a href="javascript:void();;" class="btn btn-primary light btn-sm mb-1"
                                            style="direction: ltr;">Dashboard</a>
                                        <a href="javascript:void();;"
                                            class="btn btn-primary light btn-sm mb-1">Photoshop</a>
                                        <a href="javascript:void();;" class="btn btn-primary light btn-sm mb-1"
                                            style="direction: ltr;">Bootstrap</a>
                                        <a href="javascript:void();;"
                                            class="btn btn-primary light btn-sm mb-1">Responsive</a>
                                        <a href="javascript:void();;"
                                            class="btn btn-primary light btn-sm mb-1">Crypto</a>
                                    </div>
                                    <div class="py-3 border-bottom">
                                        <h4 class="text-primary mb-2">Language</h4>
                                        <a href="javascript:void(0);" class="badge light badge-primary">English</a>
                                        <a href="javascript:void(0);" class="badge light badge-primary">French</a>
                                        <a href="javascript:void(0);" class="badge light badge-primary">Bangla</a>
                                    </div>
                                    <div class="py-3 px-4 bg-primary-subtle text-dark rounded mt-3">
                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                        <div class="row mb-2">
                                            <div class="col-md-3 col-sm-4">
                                                <h5>Name <span class="float-sm-end">:</span></h5>
                                            </div>
                                            <div class="col-md-9 col-sm-8">
                                                <span>Mitchell C.Shay</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3 col-sm-4">
                                                <h5>Email <span class="float-sm-end">:</span></h5>
                                            </div>
                                            <div class="col-md-9 col-sm-8">
                                                <span>example@examplel.com</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3 col-sm-4">
                                                <h5>Availability <span class="float-sm-end">:</span></h5>
                                            </div>
                                            <div class="col-md-9 col-sm-8">
                                                <span>Full Time (Free Lancer)</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3 col-sm-4">
                                                <h5>Age <span class="float-sm-end">:</span></h5>
                                            </div>
                                            <div class="col-md-9 col-sm-8">
                                                <span>27</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3 col-sm-4">
                                                <h5>Location <span class="float-sm-end">:</span></h5>
                                            </div>
                                            <div class="col-md-9 col-sm-8">
                                                <span>Rosemont Avenue Melbourne, Florida</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3 col-sm-4">
                                                <h5>Year Experience <span class="float-sm-end">:</span></h5>
                                            </div>
                                            <div class="col-md-9 col-sm-8">
                                                <span>07 Year Experiences</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="underline-setting" role="tabpanel"
                                    aria-labelledby="underline-setting-tab" tabindex="0">

                                    <h4 class="text-primary mb-4">Enrolment History</h4>

                                    <div class="card shadow-sm border-0">
                                        <div class="card-body">

                                            <ul class="list-group list-group-flush">

                                                <!-- Status Update Example -->
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span class="badge bg-danger me-2">HOT</span>
                                                            <strong>Status Updated</strong>
                                                            <p class="mb-1 mt-2 text-muted">
                                                                Candidate is very interested and ready for next round.
                                                            </p>
                                                            <small class="text-secondary">
                                                                Updated by Admin
                                                            </small>
                                                        </div>
                                                        <small class="text-muted">20 Feb 2026</small>
                                                    </div>
                                                </li>

                                                <!-- Remark Example -->
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span class="badge bg-info me-2">Remark</span>
                                                            <strong>Follow-up Call</strong>
                                                            <p class="mb-1 mt-2 text-muted">
                                                                Called student, will submit documents tomorrow.
                                                            </p>
                                                            <small class="text-secondary">
                                                                Added by Counselor
                                                            </small>
                                                        </div>
                                                        <small class="text-muted">18 Feb 2026</small>
                                                    </div>
                                                </li>

                                                <!-- Another Status -->
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span class="badge bg-secondary me-2">COLD</span>
                                                            <strong>Status Updated</strong>
                                                            <p class="mb-1 mt-2 text-muted">
                                                                Not responding to calls.
                                                            </p>
                                                            <small class="text-secondary">
                                                                Updated by Admin
                                                            </small>
                                                        </div>
                                                        <small class="text-muted">15 Feb 2026</small>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span class="badge bg-primary me-2">DND</span>
                                                            <strong>Status Updated</strong>
                                                            <p class="mb-1 mt-2 text-muted">
                                                                Not responding to calls.
                                                            </p>
                                                            <small class="text-secondary">
                                                                Updated by Admin
                                                            </small>
                                                        </div>
                                                        <small class="text-muted">15 Feb 2026</small>
                                                    </div>
                                                </li>


                                            </ul>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <!-- End - Profile Feed -->

            </div>

        </div>
    </main>

    <div class="modal fade" id="sendMessageModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form class="comment-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="Author"
                                        placeholder="Mitchell C. Shay">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="info@example.com"
                                        name="Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Comment</label>
                                    <textarea rows="4" class="form-control" name="comment" placeholder="Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" value="Send Message" class="submit btn btn-primary" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End - Main Wrapper -->
@include('common.footer')
