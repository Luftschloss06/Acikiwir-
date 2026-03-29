@extends('layouts.app')

@section('title', 'Latihan 12')
@section('content')
    <div class="py-2 container"></div>
        <h4 class="my-3 border-bottom">{{ $title }}</h4>
        @foreach ($posts as $post)

    <div class="card col-sm-3" style="width: 18rem;">
        <img src="{{ $post['thumbnail'] }}" class="card-img-top" alt="{{ $post['slug'] }}">
        <div class="card-body">
            <h5 class="card-title">{{ $post['judul'] }}</h5>
            <p class="card-text">{{ substr($post['isi'], 0, 200) }}...</p>
            <a href="#" class="btn btn-primary">More...</a>
        </div>
    </div>
    @endforeach
    <div class="py-2 container"></div>
@endsection