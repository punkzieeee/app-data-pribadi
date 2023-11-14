@extends('home')

@section('index')
    <tr>
        <td>1.</td> {{-- No. --}}
        <td>1234567890</td> {{-- NIK --}}
        <td>John Doe</td> {{-- Nama Lengkap --}}
        <td>25</td> {{-- Umur --}}
        <td>1 Januari 1998</td> {{-- Tanggal Lahir --}}
        <td>Laki-laki</td> {{-- Jenis Kelamin --}}
        <td>Jl. Beton No. 1 Jakarta Timur</td> {{-- Alamat --}}
        <td>Indonesia</td> {{-- Negara --}}
        <td> {{-- Action --}}
            @include('sections.action')
        </td>
    </tr>
@endsection
