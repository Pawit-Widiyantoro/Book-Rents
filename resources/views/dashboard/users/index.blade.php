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
            <a href="/dashboard/users/create" class="btn btn-primary">Add User</a>
            <a href="/dashboard/users/activation" class="btn btn-info">Activate User</a>
            <a href="/dashboard/users/banned" class="btn btn-secondary">Banned User</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        {{-- <th>Status</th> --}}
                        {{-- <th>Role</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        {{-- <td>{{ $user->status }}</td> --}}
                        {{-- <td>{{ $user->role_id }}</td> --}}
                        <td>
                            <a href="/books/edit" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i></a>
                            <form action="/books" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                            </form>
                            <form action="/dashboard/users/{{ $user->username }}/ban" method="post" class="d-inline">
                                @method('put')
                                @csrf
                                <button class="btn btn-sm btn-secondary" onclick="return confirm('Are you sure?')"><i class="fa fa-ban"></i></button>
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