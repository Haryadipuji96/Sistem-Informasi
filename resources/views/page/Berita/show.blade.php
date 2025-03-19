
<div class="container">
    <h1>{{ $berita->title }}</h1>
    <p>{{ $berita->content }}</p>
    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
</div>
