@include('common.header')

<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Website</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Website Add</li>
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

            <form action="{{ route('insert.website') }}" method="post" enctype="multipart/form-data"
                onSubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <input type="hidden" name="id" value="{{ $website?->id }}">
                            <input type="hidden" name="vendor_id" value="{{ $vendorId }}">
                            <label for="" class="form-label"> Site Name<strong class="text-danger"> * </strong>
                            </label>
                            <input type="text" name="sitename" value="{{ old('sitename', $website?->sitename) }}"
                                class="form-control" id="" placeholder="Site Name" required maxlength="200">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label"> URL <strong class="text-danger"> * </strong>
                            </label>
                            <input type="url" name="url" class="form-control"
                                value="{{ old('url', $website?->url) }}" placeholder="URL" required maxlength="100">
                            
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Email <strong class="text-danger"> * </strong>
                            </label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="{{ old('email', $website?->email) }}" maxlength="100" required>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label"> Logo Url <strong class="text-danger"> *
                                </strong> </label>
                            <input type="url" name="logoUrl" class="form-control" id=""
                                placeholder="Logo Url" value="{{ old('logoUrl', $website?->logoUrl) }}" maxlength="255"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label"> SMTP Email</label>
                            <input type="email" name="smtpEmail" value="{{ old('smtpEmail', $website?->smtpEmail) }}" class="form-control" id="" placeholder="SMTP Email" maxlength="100">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label"> SMTP Port (Optional) </label>
                            <input type="text" name="smtpPort" value="{{ old('smtpPort', $website?->smtpPort) }}"
                                class="form-control" placeholder="SMTP Port" maxlength="100">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">SMTP Host (Optional)</label>
                            <input type="text" name="smtpHost" value="{{ old('smtpHost', $website?->smtpHost) }}"
                                class="form-control" placeholder="SMTP Host" max="100">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">SMTP Password (Optional)</label>
                            <input type="text" name="smtpPassword"
                                value="{{ old('smtpPassword', $website?->smtpPassword) }}" class="form-control"
                                placeholder="SMTP Password" maxlength="225">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">CC Email (Optional) </label>
                            <input type="email" class="form-control"
                                value="{{ old('ccEmail', $website?->ccEmail) }}" name="ccEmail"
                                placeholder="CC Email" maxlength="100">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">BCC Email</label>
                            <input type="email" name="bccEmail" value="{{ old('bccEmail', $website?->bccEmail) }}"
                                class="form-control" placeholder="BCC Emaillance" id="" maxlength="100">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Certificate Authority</label>
                            <input type="name" name="certificateAuthority"
                                value="{{ old('certificateAuthority', $website?->certificateAuthority) }}"
                                class="form-control" placeholder="Certificate Authority" id=""
                                maxlength="200">
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Certificate Url</label>
                            <input type="url" name="certificateUrl"
                                value="{{ old('certificateUrl', $website?->certificateUrl) }}" class="form-control"
                                placeholder="Certificate Url" id="" maxlength="100">
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
