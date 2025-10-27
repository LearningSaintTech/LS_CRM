<script>
    const _toast = (type, message) => {
        if (!message) return;
        toastr[type](message);
    };

    @if (session('toast_type') && session('toast_message'))
        _toast("{{ session('toast_type') }}", "{{ addslashes(session('toast_message')) }}");
    @endif

    @if ($errors->any())
        _toast('error', "{{ $errors->first() }}");
    @endif
</script>
