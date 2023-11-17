<div class="modal" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                Anda yakin menghapus data {{ $data['nama_lengkap'] }}?
            </div>
            <div class="modal-footer">
                <form action="#"{{-- redirect()->action('http://127.0.0.1:8080/api/v1/delete', ['nik'=>$data['nik']]) --}} method="post">
                    <button type="submit" class="btn btn-primary">OK</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
