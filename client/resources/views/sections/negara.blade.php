@php
    $countries = ['Amerika Serikat', 'Argentina', 'Australia', 'Brazil', 'China', 'India', 'Indonesia', 'Inggris', 'Jepang', 'Jerman', 'Kanada', 'Korea Selatan', 'Malaysia', 'Meksiko', 'Mesir', 'Rusia', 'Portugal', 'Saudi Arabia', 'Singapura', 'Spanyol', 'Thailand'];
@endphp

@foreach ($countries as $country)
    <option value='{{ $country }}' {{ $data['negara'] === $country ? 'selected' : '' }}>{{ $country }}</option>
@endforeach
