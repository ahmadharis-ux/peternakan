<div class="d-block w-100 mx-auto">
    @if (session()->has('success'))
        <div class="alert alert-success col" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger col" role="alert">
            {{ session('error') }}
        </div>
    @endif
</div>
