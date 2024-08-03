@extends('dashboard.layouts.main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="col-lg-8">
    <h2>Update Book</h2>
    <form action="/dashboard/books/{{ $book->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title', $book->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="book_code" class="form-label">Book Code</label>
            <input type="text" class="form-control @error('book_code') is-invalid @enderror" id="book_code" name="book_code" value="{{ old('book_code', $book->book_code) }}">
            @error('book_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if ($book->cover)
                <img src="{{ Asset('storage/'.$book->cover) }}" alt="{{ $book->title }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input type="file" class="form-control @error('cover') is-invalid @enderror" id="image" name="cover" onchange="previewImage()">
            @error('cover')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select select-multiple" name="category[]" multiple>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ (collect(old('category', $book->categories->pluck('id')->toArray()))->contains($category->id)) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFRevent) {
            imgPreview.src = oFRevent.target.result;
        };
    }

    // Initialize Select2
    $(document).ready(function() {
        console.log('jQuery version:', $.fn.jquery);
        $('.select-multiple').select2();
    });
</script>

@endsection
