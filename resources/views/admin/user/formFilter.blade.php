@php
    $filterRole = request('role');
    
    $filtered = $filterRole;
    
@endphp

<div class="container mb-3">
    <form action="/admin/users" method="get">

        <div class="d-flex justify-content-start mb-3 flex-row flex-wrap">

            {{-- role sapi --}}
            <div class="me-3 col-3 mb-3">
                <label class="form-label">Role</label>
                <select name="role" id="roleFilter" class="form-select">
                    <option value="0" disabled {{ !request('role') ? 'selected' : '' }}>-- Pilih role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $role == request('role') ? 'selected' : '' }}>
                            {{ $role->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-start">
            <input id="btnSubmitFilter" class="btn btn-primary me-3" type="submit" value="Terapkan filter" hidden>


            @if ($filtered)
                <a href="/admin/users" class="btn btn-secondary me-3">Hapus filter</a>
            @endif

        </div>

    </form>
</div>


<script>
    $(document).ready(function() {
        $("select#roleFilter").change(function() {
            $("#btnSubmitFilter").removeAttr('hidden')
        })
    })
</script>
