<style>
    .simple-loader {
        position: fixed;
        inset: 0;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .simple-loader.hidden {
        opacity: 0;
        visibility: hidden;
    }

    .simple-loader::after {
        content: "";
        width: 40px;
        height: 40px;
        border: 4px solid #e0e0e0;
        border-top-color: #0d6efd;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>

<!-- Loader -->
<div class="simple-loader" id="loader"></div>

<script>
    // Hide loader only after full page load
    window.addEventListener('load', function() {
        const loader = document.getElementById('loader');
        loader.classList.add('hidden');
    });
</script>

{{-- <script>
    document.addEventListener('contextmenu', e => e.preventDefault());
    document.addEventListener('keydown', function(e) {
        if (
            e.key === 'F12' ||
            (e.ctrlKey && e.shiftKey && ['I', 'C', 'J'].includes(e.key)) ||
            (e.ctrlKey && e.key === 'U')
        ) {
            e.preventDefault();
        }
    });
</script>

<script>
    (function() {
        let blocked = false;
        setInterval(() => {
            if (
                window.outerWidth - window.innerWidth > 160 ||
                window.outerHeight - window.innerHeight > 160
            ) {
                if (!blocked) {
                    blocked = true;
                    document.body.innerHTML =
                        '<h2 style="text-align:center;margin-top:20%">Access Denied</h2>';
                }
            }
        }, 1000);
    })();
</script> --}}
