@extends('layout.app')
@section('title', 'Tambah Post')
@section('header-title', 'Tambah Post')
@section('content')

<div class="card border-0 shadow-sm rounded">
    <div class="card-body">
        <form action=""method="POST" enctype="multipant/form-data">
            @csrf 
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Judul Post">
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
</div>
<div class="form-group">
    <label for="content">Konten</label>
    <textarea class="form-control" id="content" name="content" rows="5" placeholder="Masukan Konten Post"></textarea>
    @error('image')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>