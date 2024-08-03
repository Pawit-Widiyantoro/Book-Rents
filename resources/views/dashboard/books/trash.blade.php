@extends('dashboard.layouts.main')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="/dashboard/books" class="btn btn-primary">Back</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Book Code</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->book_code }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->status }}</td>
                        <td>
                            <form action="/dashboard/books/{{ $book->slug }}/restore" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-secondary" onclick="return confirm('Are you sure want to restore this book?')"><i class="fa fa-trash-restore"></i></button>
                            </form>
                            <form action="/dashboard/books/{{ $book->slug }}/forceDelete" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection