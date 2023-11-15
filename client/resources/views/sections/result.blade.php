@extends('home')

@section('result')
    @php
        $sum = 1;
    @endphp
    @foreach ($res as $data)
        <tr>
            <td>{{ $sum }}.</td> {{-- No. --}}
            <td>{{ $data['nik'] }}</td> {{-- NIK --}}
            <td>{{ $data['nama_lengkap'] }}</td> {{-- Nama Lengkap --}}
            <td>{{ Carbon\Carbon::parse(now())->diffInYears(Carbon\Carbon::parse($data['tgl_lahir'])) }}</td>
            {{-- Umur --}}
            <td>{{ Carbon\Carbon::parse($data['tgl_lahir'])->translatedFormat('d F Y') }}</td> {{-- Tanggal Lahir --}}
            <td>{{ $data['jenis_kelamin'] }}</td> {{-- Jenis Kelamin --}}
            <td>{{ $data['alamat'] }}</td> {{-- Alamat --}}
            <td>{{ $data['negara'] }}</td> {{-- Negara --}}
            <td> {{-- Action --}}
                @include('sections.action', $data)
            </td>
        </tr>
        @php
            $sum++;
        @endphp
    @endforeach
@endsection
