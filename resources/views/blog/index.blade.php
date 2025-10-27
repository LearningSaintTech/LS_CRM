@include('common.header')
<main class="content-body">
    <x-page-header title="Blog List" :add-route="route('blog.create')" :back="url()->previous()"/>
    <div class="card shadow-sm border-0">
        <div class="card-body table-card-body px-3 pt-2 pb-3">
            <div class="table-responsive">
                <table id="employeesTable" class="table table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:10%">Sr-No</th>
                            <th style="width:10%">Slug</th>
                            <th style="width:10%">Title</th>
                            <th style="width:10%">Description</th>
                            <th style="width:10%">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</main>

@include('common.footer')
