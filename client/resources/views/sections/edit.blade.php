<div class="modal fade" id="edit-modal-{{$data['uuid']}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #f2f2f2;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5><i class="bi bi-person-vcard"></i> Aplikasi Data Pribadi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p>Edit Data Pribadi</p>
                <form action={{ route('data.update', ['nik' => request()->input('nik'), 'nama_lengkap' => request()->input('nama_lengkap'), 'jenis_kelamin' => request()->input('jenis_kelamin'), 'tgl_lahir' => request()->input('tgl_lahir'), 'alamat' => request()->input('alamat'), 'negara' => request()->input('negara'), 'uuid'=>$data['uuid']]) }}
                    method="POST">
                    @csrf
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK"
                            name="nik" value={{ $data['nik'] }}>
                        <label for="nik">NIK</label>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control" id="nama_lengkap"
                            placeholder="Masukkan nama lengkap" name="nama_lengkap" value={{ $data['nama_lengkap'] }}>
                        <label for="nama_lengkap">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-1">
                        <p>Jenis Kelamin</p>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin"
                                value="Laki-laki" @if ($data['jenis_kelamin'] === 'Laki-laki') @checked(true) @endif>Laki-laki
                            <label class="form-check-label" for="laki"></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin"
                                value="Perempuan" @if ($data['jenis_kelamin'] === 'Perempuan') @checked(true) @endif>Perempuan
                            <label class="form-check-label" for="perempuan"></label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <p>Tanggal Lahir</p>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" value={{ Carbon\Carbon::parse($data['tgl_lahir'])->translatedFormat('Y-m-d') }}>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Masukkan alamat lengkap" id="alamat" name="alamat" style="height: 100px">{{ $data['alamat'] }}</textarea>
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="negara" name="negara" aria-label="Pilih negara">
                            <option disabled>Pilih negara</option>
                            @include('sections.negara')
                        </select>
                        <label for="negara">Negara</label>
                    </div>
                    <button type="submit" class="btn btn-primary" formmethod="POST">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>
