@php
    $listBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $unixTime = strtotime(carbonNow());
    $numBulanSekarang = getDate($unixTime)['mon'];
@endphp


<div class="container mb-3">
    <form action="/acc/gaji/pekerja/{{ $pekerja->id }}" method="get">


        <div class="d-flex flex-row justify-content-start flex-wrap mb-3">


            {{-- tahun --}}
            {{-- <div class="mb-3 me-3 col-3">
                <label class="form-label">Tahun</label>
                <select name="tahun" class="form-select">
                    @foreach ($listTahun as $tahun)
                        @php
                            $numTahun = $loop->iteration;
                        @endphp

                        <option value="{{ $numTahun }}" {{ $numTahun == $numTahunSekarang ? 'selected' : '' }}>
                            {{ $tahun }}</option>
                    @endforeach
                </select>
            </div> --}}


            {{-- bulan --}}
            <div class="mb-3 me-3 col-3">
                <label class="form-label">Bulan</label>
                <select name="bulan" class="form-select">
                    @foreach ($listBulan as $bulan)
                        @php
                            $numBulan = $loop->iteration;
                        @endphp

                        <option value="{{ $numBulan }}" {{ $numBulan == $numBulanSekarang ? 'selected' : '' }}>
                            {{ $bulan }}</option>
                    @endforeach
                </select>
            </div>


            {{-- Tahun --}}
            <div class="mb-3 me-3 col-3">
                <label class="form-label">Tahun</label>
                <select name="bulan" class="form-select">
                    @for ($i = 2023; $i <= 2030; $i++)
                        <option value="{{ $i }}">
                            {{ $i }}</option>
                    @endfor
                </select>
            </div>




        </div>

        <div class="d-flex justify-content-start">
            <input id="btnSubmitFilter" class="btn btn-primary me-3" type="submit" value="Terapkan filter" hidden>

            {{--
            @if ($filtered)
                <a href="/acc/sapi" class="btn btn-secondary me-3">Hapus filter</a>
            @endif --}}

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
