@extends('dashboard.layouts.main')

@section('content')

<div class="col-lg-4">
    <h2>Create Category</h2>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="/dashboard/categories" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Save</button>
    </form>
</div>

@endsection