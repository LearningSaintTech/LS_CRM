<script>
    $('#employeesTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route('users.data') }}',
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search user...",
        lengthMenu: "Show _MENU_ entries"
    },
    columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'role', name: 'role', orderable: false, searchable: false },
        { data: 'status', name: 'status', orderable: false, searchable: false },
        { data: 'action', name: 'action', orderable: false, searchable: false },
    ],
    order: [[0, 'asc']],
    pageLength: 10
});

</script>
