<script>
    const _toast = (type, message) => {
        if (!message) return;
        const escaped = String(message).replace(/"/g, '\\"').replace(/\n/g, '\\n');
        toastr[type](escaped);
    };

    // Laravel error/success
    @if (session('success'))
        _toast('success', "{{ addslashes(session('success')) }}");
    @endif
    @if ($errors->any())
        _toast('error', "{{ $errors->first() }}");
    @endif

    // Laracasts Flash messages
    @if (session()->has('flash_notification'))
        @foreach (session('flash_notification', collect())->toArray() as $message)
            _toast("{{ $message['level'] ?? 'info' }}", "{{ addslashes($message['message'] ?? '') }}");
        @endforeach
    @endif
</script>
