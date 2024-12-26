@if (session()->has('lara-toast'))
    <div class="toast-container"></div>
    <script>
        let toast = @json(session('lara-toast'));
        document.addEventListener('DOMContentLoaded', function() {
            showToast(toast.type, toast.title, toast.description, toast.autoCloseInMs);
        });
    </script>
    @php
        session()->forget('lara-toast')
    @endphp
@endif
