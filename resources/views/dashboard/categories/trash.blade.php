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
            <a href="/dashboard/categories" class="btn btn-primary">&laquo; Back</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 5%;">No.</th>
                        <th class="text-center">Name</th>
                        <th style="width: 10%;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-center">
                            <form action="/dashboard/categories/{{ $category->slug }}/restore" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-success" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-restore"></i></button>
                            </form>
                            <form action="/dashboard/categories/{{ $category->slug }}/forceDelete" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to permanently delete this category?')"><i class="fa fa-trash"></i></button>
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