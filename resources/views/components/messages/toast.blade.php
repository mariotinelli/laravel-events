@if (session()->has('success'))
    <script>
        toastr.success("{{ session('success') }}")
    </script>

    @php
        Session::forget('success');
        session()->forget('success');
    @endphp
@elseif(session()->has('info'))
    <script>
        toastr.info("{{ session('info') }}")
    </script>

    @php
        Session::forget('info');
        session()->forget('info');
    @endphp
@elseif(session()->has('warning'))
    <script>
        toastr.warning("{{ session('warning') }}")
    </script>

    @php
        Session::forget('warning');
        session()->forget('warning');
    @endphp
@elseif(session()->has('error'))
    <script>
        toastr.error("{{ session('error') }}")
    </script>

    @php
        Session::forget('error');
        session()->forget('error');
    @endphp
@endif
