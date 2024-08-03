@extends('dashboard.layouts.main')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="col-lg-8">
    <h2>Create Book</h2>
    <form action="/dashboard/books" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="book_code" class="form-label">Book Code</label>
            <input type="text" class="form-control @error('book_code') is-invalid @enderror" id="book_code" name="book_code" value="{{ old('book_code') }}">
            @error('book_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
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
                @if(old('category') == $category->name)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else 
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Save</button>
    </form>
</div>

<!-- Include jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
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
