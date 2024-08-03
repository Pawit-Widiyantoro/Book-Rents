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
            <a href="/dashboard/books/create" class="btn btn-primary">Add Book</a>
            <a href="/dashboard/books/trash" class="btn btn-secondary">Trash</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Book Code</th>
                        <th>Cover</th>
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
                        <td>
                            {{-- @if ($book->cover)                                
                                <div style="height: 100px;width:100px;overflow:hidden;"> 
                                <img src="{{ asset('storage/'. $book->cover) }}" alt="{{ $book->title }}" class="img-fluid">
                                </div>
                            @endif --}}
                            @foreach($book->categories as $category)
                                {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->status }}</td>
                        <td>
                            <a href="/dashboard/books/{{ $book->slug }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="/dashboard/books/{{ $book->slug }}/edit" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i></a>
                            <form action="/dashboard/books/{{ $book->slug }}" method="post" class="d-inline">
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