@extends('layouts.app')

@section('title','View Post')

@section('header-title','View Post')

@section('content')
<div class ="card border-0 shadow-sm rounded">
    <div class="card-body">
        <h5 class="card-title">Judul Pots</h5>
        @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-3" alt="Post Image" style="max-width: 100%;">
        @else
        <p class="text-muted">No Image</p>
        @endif
        <p> class="card-text">{{ $post->content }}</p>
        <p> href="{{ route('posts.index') }}</p> 
        <img src="{{ asset('images/254721151_utb_kotak.png') }}"class="img-fluid rounded mb-3" alt="post image" style="max-width: 100%;">
        <p class="card-text">Konten Post</p>
        <a href="#" class="btn btn-primary">Kembali</a>
</div>
</div>
@endsection