<div class="modal fade" id="detailModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #f2f2f2;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5><i class="bi bi-person-vcard"></i> Aplikasi Data Pribadi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p>Detail Data Pribadi</p>
                <form action="#">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK"
                            name="nik" disabled>
                        <label for="nik">NIK</label>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap"
                            name="nama" disabled>
                        <label for="nama">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-1">
                        <p>Jenis Kelamin</p>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="laki" name="optradio"
                                value="Laki-laki" disabled>Laki-laki
                            <label class="form-check-label" for="laki"></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="perempuan" name="optradio"
                                value="Perempuan" disabled>Perempuan
                            <label class="form-check-label" for="perempuan"></label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <p>Tanggal Lahir</p>
                        <input type="date" id="tglLahir" name="tglLahir" disabled>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Masukkan alamat lengkap" id="alamat" style="height: 100px" disabled></textarea>
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="negara" aria-label="Pilih negara" disabled>
                            <option disabled>Pilih negara</option>
                            @include('sections.negara')
                        </select>
                        <label for="negara">Negara</label>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
