@extends('dashboard.layouts.main')

@section('content')

<div class="row">
    <div class="col text-center">
        {{-- <img src="img/{{ $image }} " alt="{{ $name }}" class="img-thumbnail rounded-circle" width="200"> --}}
        <h3 class="display-4"> Nama </h3>
        <p class="blockquote-footer mt-2"> nama@gmail.com </p>
        {{-- <blockquote class="blockquote text-center">
            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
        </blockquote> --}}
    </div>
    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="btn btn-dark align-items-center gap-2 text-white ms-3 mt-2">
            <i class="bi bi-box-arrow-right mb-1"></i>
            Logout
        </button>
    </form>
</div>

@endsection