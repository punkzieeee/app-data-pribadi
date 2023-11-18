<div class="modal" id="delete-modal-{{$data['uuid']}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                Anda yakin menghapus data {{ $data['nama_lengkap'] }}?
            </div>
            <div class="modal-footer">
                <form action={{ route('data.destroy', ['nik'=>$data['nik']]) }} method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">OK</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
