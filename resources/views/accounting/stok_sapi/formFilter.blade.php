@php
    $arrKondisi = ['Sehat', 'Hidup', 'Mati', 'Gila'];
    $arrStatus = ['ADA', 'DIBELI', 'TERJUAL'];

    $filterJenis = request('jenis');
    $filterStatus = request('status');
    $filterKondisi = request('kondisi');

    $filtered = $filterJenis || $filterStatus || $filterKondisi;

@endphp

<div class="container mb-3">
    <form action="/acc/sapi" method="get">

        <div class="d-flex flex-row justify-content-start flex-wrap mb-3">

            {{-- jenis sapi --}}
            <div class="mb-3 me-3 col-3">
                <label class="form-label">Jenis</label>
                <select name="jenis" class="form-select">
                    <option value="0" disabled {{ !request('jenis') ? 'selected' : '' }}>-- Pilih status --</option>
                    @foreach ($listJenisSapi as $jenisSapi)
                        <option value="{{ $jenisSapi->id }}" {{ $jenisSapi == request('jenis') ? 'selected' : '' }}>
                            {{ $jenisSapi->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- status sapi --}}
            <div class="mb-3 me-3 col-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="0" disabled {{ !request('status') ? 'selected' : '' }}>-- Pilih status --
                    </option>
                    @foreach ($arrStatus as $status)
                        <option value="{{ $status }}" {{ $status == request('status') ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- kondisi sapi --}}
            <div class="mb-3 me-3 col-3">
                <label class="form-label">Kondisi</label>
                <select name="kondisi" class="form-select">
                    <option value="0" disabled {{ !request('kondisi') ? 'selected' : '' }}>-- Pilih kondisi --
                    </option>
                    @foreach ($arrKondisi as $kondisi)
                        <option value="{{ $kondisi }}" {{ $kondisi == request('kondisi') ? 'selected' : '' }}>
                            {{ $kondisi }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="d-flex justify-content-start">
            <input id="btnSubmitFilter" class="btn btn-primary me-3" type="submit" value="Terapkan filter" hidden>


            @if ($filtered)
                <a href="/acc/sapi" class="btn btn-secondary me-3">Hapus filter</a>
            @endif

        </div>

    </form>
</div>


<script>
    $(document).ready(function() {
        $("select").change(function() {
            $("#btnSubmitFilter").removeAttr('hidden')
        })
    })
</script>
