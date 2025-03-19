
<div class="container">
    <h1>Edit Berita</h1>
    <form action="{{ route('berita.update', $berita) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul Berita</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $berita->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea name="content" id="content" rows="5" class="form-control" required>{{ $berita->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
