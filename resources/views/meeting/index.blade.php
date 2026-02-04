@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mt-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Meeting</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Meeting </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="me-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>

            <a href="{{ route('add.meting') }}"
                class="btn btn-info btn-sm shadow-sm">
                <i class="fas fa-plus me-1"></i> Add
            </a>

        </div>
    </div>
    <div class="card h-auto container">
        <div class="card-body table-card-body pt-0 px-0 pb-1">

            <div class="table-responsive check-wrapper table-container">
                <table id="vendoruserTable" class="table table-striped table-hover table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID </th>
                            <th>Site Name </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Support Type</th>
                            <th>Meeting Date</th>
                            <th>Meeting Link</th>
                            <th>Message</th>
                            <th>Level</th>
                            <th>Vendor Name</th>
                            <th>Status</th>
                            <th>Created At </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meetings as $payment)
                            <tr>
                                <td>{{ $payment?->id }}</td>
                                <td>{{ $payment?->siteId }}</td>
                                <td>{{ $payments?->name }}</td>
                                <td>{{ $payments?->email }}</td>
                                <td>{{ $payments?->course }}</td>
                                <td>{{ $payments?->supportType }}</td>
                                <td>{{ $payments?->meetingDate }}</td>
                                <td>{{ $payments?->meetingLink }}</td>
                                <td>{{ $payments?->message }}</td>
                                <td>{{ $payments?->level }}</td>
                                <td>{{ $payments?->vendor_id }}</td>
                                <td>
                                    <span class="badge badge-success light">
                                        @if ($payments?->status == 1)
                                            Active
                                        @else
                                            In-Active
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $payments?->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-primary light btn-square"
                                            data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item edit-payment-user"
                                                    data-url="{{ route('payment.edit', $payments->id) }}" href="#"
                                                    data-id="{{ $payments->id }}">Edit</a></li>
                                            <li><a class="dropdown-item text-danger"
                                                    href="javascript:void(0);">Delete</a>
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
</main>


@include('common.footer')
