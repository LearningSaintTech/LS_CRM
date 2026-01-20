<script>
    $(document).ready(function() {
        $('#blogTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('blog.data') }}',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search blog...",
                lengthMenu: "Show _MENU_ entries"
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            order: [
                [0, 'asc']
            ],
            pageLength: 10
        });
    });
</script>
