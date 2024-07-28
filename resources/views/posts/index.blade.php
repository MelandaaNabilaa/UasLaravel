@extend('layout.app')

@section('title','Data Posts')

@section('header-title'.'Data Posts')

@section('content')
<div class="card border-0 shadow-sm rounded">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title text-primary">Data Posts</h5>
            <a href="#" class="btn btn-success">TAMBAH POST</a>
</div>
<table class="table table-striped table-hover">
    <thread class="bg-primary text-white">
        <tr>
            <th scope="col">GAMBAR</th>
            <th scope="col">JUDUL</th>
            <th scope="col">CONTENT</th>
            <th scope="col">AKSI</th>
</tr>
</thread>
<tbody>
    <style>
        .pagination svg {
            width: 1em; /* mengatur lebar ikon */
            height: 1em; /* mengatur tinggi ikon */
        }
        </style>
    <tr>
        <td class="text-center">
       <img src="{{ asset('images/254721151_utb_kotak.png') }}" class="rounded" style="width:150px" alt="Post Image">
</td>
<td>Contoh Judul</td>
<td>Contoh Konten</td>
<td class="text-center">
    <form onsubmit="return confirm('Apakah Anda Yakin?');"action=""method="post">
        <a href="" class="btn btn-dark btn-sm">SHOW</a>
        <a href="" class="btn btn-primary btn-sm">EDIT</a>
        <button type="submit" class="btn btn-danger btn-sm">HAPUS</button>
</form>
</td>
</tr>
<!-- Jika tidak ada data -->
 <tr>
    <td colspan="4" class="text-center">
    <div class="alert alert-danger">
        Data Post Belum Tersedia
</div>
</td>
</tr>
</tbody>
</table>
<!-- Pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
</li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item">
    <a class="page-link" href="#">Next</a>
</li>
</ul>
</nav>
</div>
</div>


<form onsubmit="return confirm('Apakah Anda Yakin?');" action="" method="POST">
    <a href="{{ route('posts.view', 1) }}" class="btn btn-dark btn-sm">SHOW</a>
    <a href="{{ route('posts.view', 1) }}" class="btn btn-primary btn-sm">EDIT</a>
    <button type="submit" class="btn btn-danger btn-sm">HAPUS</BUTTON>
</form>

<tbody>
    |@forelse ($posts as $post)
    <tr>
        <td class="text-center">
            @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="rounded" stylle="width: 150px" alt="Post Image">
            @else
            <span> No Image </span>
            @endif
        </td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->content }}</td>
        <td class="text-center">
            <form onsubmit="return confirm('Apakah Anda YAkin?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                <a href="{{ route('posts.view', $post->id }}" class="btn btn-dark btn-sm">SHOW</a>
                <a href="{{ route('posts.edit', $post->id }}" class="btn btn-edit btn-sm">EDIT</a>
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">HAPUS</button>
    </form>
    </td>
    </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">
                <div class="alert alert-danger">
    </div>
    </td>
    </tr>
    @endforelse

    <tbody>
        |@forelse ($posts as @post)
        <tr>
            <td class="text-center">
                @if($post->image)
                <img src="{{ asset('storage/' . #post->image) }}" class="rounded" style="width: 150px" alt="Post Image">
                @else
                <span>No Image</span>
                @endif
    </td>
    <td>{{ @post->title }}</td>
    <td>{{ @post->content }}</td>
    <td class="text-center">
        <form onsubmit="return confirm ('Apakah Anda Yakin?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
            <a href="{{ route('posts.view', $post->id) }}" class="btn btn-dark btn-sm">SHOW</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">EDIT</a>
            @csrf 
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">HAPUS</button>
    </form>
    </td>
    </tr>
    @empty
    <tr>
        <td> colspan="4" class="text-center">
            <div class="alert alert-danger">
                Data Post Belum Tersedia
    </div>
    </td>
    </tr>
    @endforelse
    </tbody>
@endsection
