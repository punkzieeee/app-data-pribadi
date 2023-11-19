<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <title>Aplikasi Data Pribadi</title>
</head>

<body style="background-color: #ffffcc;">
    <a href="http://127.0.0.1:8000/" style="color: black; text-decoration: none;">
        <div class="container pt-5 mb-3">
            <h1 class="display-4"><i class="bi bi-person-vcard"></i> Aplikasi Data Pribadi</h1>
        </div>
    </a>
    <div class="container pt-5 bg-warning border border-2 border-danger-subtle rounded-4" style="--bs-bg-opacity: .5;">
        <form
            action={{ route('data.show', ['nik' => request()->input('nik'), 'nama_lengkap' => request()->input('nama_lengkap')]) }}
            method="GET">
            @csrf
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK" minlength="16" name="nik">
                <label for="nik">NIK</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan nama" minlength="1"
                    name="nama_lengkap">
                <label for="nama_lengkap">Nama</label>
            </div>
            <div class="container mb-2 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Search</button>
                <div class="mx-right p-1"></div>
        </form>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputModal">Add</button>
        @include('sections.input')
    </div>

    </div>
    <div class="container pt-5">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <td>No.</td>
                    <td>NIK</td>
                    <td>Nama Lengkap</td>
                    <td>Umur</td>
                    <td>Tanggal Lahir</td>
                    <td>Jenis Kelamin</td>
                    <td>Alamat</td>
                    <td>Negara</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @yield('index')
                @yield('result')
            </tbody>
        </table>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if (session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>

</html>
