@include('common.header')

<main class="content-body">
    <div class="page-title">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Reviews </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 d-sm-flex d-block align-items-center">
                        <h4 class="card-title">Review</h4>
                        <div class="clearfix">
                            <div class="d-inline-block m-1" id="employeesTableExcelBTN"></div>
                            <a class="btn btn-primary btn-sm m-1" data-bs-toggle="offcanvas" href="#offcanvasExample"
                                role="button" aria-controls="offcanvasExample">+ Add Review </a>
                            {{-- <button type="button" class="btn btn-secondary btn-sm m-1" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">+ Invite Vendor</button> --}}
                        </div>
                    </div>
                    
                    
                    <div class="card-body table-card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            @include( 'reviews.table')
                        </div>
                    </div>
                </div>
            </div>
            @include('reviews.model')
        </div>
    </div>
</main>

@include('common.footer')
@include('meeting.js')
@include('reviews.js')
