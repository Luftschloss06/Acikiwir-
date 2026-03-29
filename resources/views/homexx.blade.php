@extends('layouts.app')

@section('title', 'Latihan 12')

@section('content')
    <p>
       Hallo Ini bagian body, nama : {{ $data['name'] }}, email : {{ $data['email'] }}
    </p>
@endsection