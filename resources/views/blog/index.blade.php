@include('common.header')
<main class="content-body">
    <x-page-header title="Blog List" :add-route="route('blog.create')" :back="url()->previous()"/>
    <div class="card shadow-sm border-0">
        <div class="card-body table-card-body px-3 pt-2 pb-3">
            <div class="table-responsive">
                <table id="blogTable" class="table table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Sr-No</th>
                            <th>Slug (URL)</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th style="width:11%">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</main>

@include('common.footer')
@include('blog.js')
