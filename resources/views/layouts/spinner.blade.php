<style>
    .simple-loader {
        position: fixed;
        inset: 0;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .simple-loader::after {
        content: "";
        width: 40px;
        height: 40px;
        border: 4px solid #ddd;
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
<div class="simple-loader" id="loader"></div>
<script>
    window.addEventListener('load', function() {
        document.getElementById('loader').style.display = 'none';
    });
</script>
