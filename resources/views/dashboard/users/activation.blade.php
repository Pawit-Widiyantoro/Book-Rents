@extends('dashboard.layouts.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="/dashboard/users" class="btn btn-primary">Back</a>
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
                            <form action="/dashboard/users/{{ $user->username }}/activate" method="post" class="d-inline">
                                @method('put')
                                @csrf
                                <button class="btn btn-sm btn-primary" onclick="return confirm('Are you sure?')"><i class="fa fa-check"></i></button>
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