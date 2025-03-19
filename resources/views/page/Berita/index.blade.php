

<div class="container">
    <h1>Berita Desa</h1>
    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($berita as $berita)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $berita->title }}</h5>
                        <p class="card-text">{{ Str::limit($berita->content, 100) }}</p>
                        <a href="{{ route('berita.show', $berita) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                        <a href="{{ route('berita.edit', $berita) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('berita.destroy', $berita) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
