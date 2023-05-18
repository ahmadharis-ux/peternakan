<div class="modal fade" id="modalDeleteJurnal-{{ $jurnal->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/acc/jurnal/{{ $jurnal->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')

                <input type="hidden" name="id_jurnal" value="{{ $jurnal->id }}">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus jurnal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5">
                    <p>Hapus jurnal {{ $jurnal->nama }}?</p>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
