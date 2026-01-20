@include('common.header')
<main class="content-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="page-title mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('insert.blog') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Site <span class="text-danger"> * </span>
                                    </label>
                                    <select name="website" id="" class="form-select">
                                        <option value="" selected disabled>{{ __('messages.select_website') }}
                                        </option>
                                        @foreach ($websites as $websitess)
                                            <option value="{{ $websitess->id }}">{{ $websitess->sitename }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label"> Title <span class="text-danger"> * </span>
                                    </label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title"
                                        value="{{ isset($blog) ? $blog->title : old('title') }}" required
                                        maxlength="300">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">Meta Title <span class="text-danger"> *
                                        </span> </label>
                                    <input type="text" class="form-control" name="meta_title"
                                        placeholder="Enter meta title"
                                        value="{{ isset($blog) ? $blog->meta_title : old('meta_title') }}" required
                                        maxlength="500">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label"> Meta Keywords <span class="text-danger"> *
                                        </span> </label>
                                    <input type="text" class="form-control" name="meta_keywords"
                                        placeholder="Enter meta Keywords"
                                        value="{{ isset($blog) ? $blog->meta_keywords : old('meta_keywords') }}"
                                        required maxlength="500">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label"> Status <span class="text-danger"> *
                                        </span> </label>
                                    <select name="status" id="" class="form-select">
                                        <option value="Active">Active</option>
                                        <option value="In-Active">In-Active</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Meta description <span class="text-danger">
                                            * </span> </label>
                                    <textarea type="text" class="form-control" name="meta_description" placeholder="Enter meta description"
                                        value="{{ isset($blog) ? $blog->meta_description : old('meta_description') }}" required maxlength="2000"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label"> Meta Keywords <span class="text-danger"> *
                                        </span> </label>
                                    <input type="text" class="form-control" name="meta_keyword"
                                        placeholder="Enter Meta Keyword" id="" required
                                        value="{{ isset($blog) ? $blog->meta_keywords : old('meta_keyword') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Author (Optional) </label>
                                    <input type="text" class="form-control" name="author" placeholder="Enter Author"
                                        value="{{ isset($blog) ? $blog->author : old('author') }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">Tags (Optional)</label>
                                    <input type="text" class="form-control" name="tags"
                                        value="{{ isset($blog) ? $blog->tags : old('tags') }}" placeholder="Tags">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">Image <span class="text-danger"> *
                                        </span></label>
                                    <input type="file" name="image" id="" class="form-control"
                                        required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label"> Image alt tag </label>
                                    <input type="text" class="form-control" name="image_tag"
                                        placeholder="Enter Image Tag"
                                        value="{{ isset($blog) ? $blog->image_tag : 'image_tag' }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="content" class="form-label">Content <span
                                            class="text-danger">*</span></label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-success btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('common.footer')
@include('blog.js')

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>
