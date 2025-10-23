<script>
    // Safe helper to print messages (escape quotes)
    const _toast = (type, message) => {
        if (!message) return;
        // unescape any existing HTML entities
        const escaped = String(message).replace(/"/g, '\\"').replace(/\n/g, '\\n');
        toastr[type](escaped);
    };

    @if ($errors->any())
        // show the first validation error
        _toast('error', "{{ $errors->first() }}");
    @endif

    @if (Session::has('success'))
        _toast('success', "{{ addslashes(session('success')) }}");
    @endif

    @if (Session::has('error'))
        _toast('error', "{{ addslashes(session('error')) }}");
    @endif

    @if (Session::has('info'))
        _toast('info', "{{ addslashes(session('info')) }}");
    @endif

    @if (Session::has('warning'))
        _toast('warning', "{{ addslashes(session('warning')) }}");
    @endif
</script>

{{-- @dd(session('success')); --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if($errors->any())
    <div class="alert alert-danger">{{ $errors->first('permission') }}</div>
@endif
