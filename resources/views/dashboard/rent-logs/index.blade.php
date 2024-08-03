@extends('dashboard.layouts.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="" class="btn btn-primary">Add Rent Log</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>User</th>
                        <th>Book Title</th>
                        <th>Rent date</th>
                        <th>Return Date</th>
                        <th>Actual Return Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Finn Camacho</td>
                        <td>Harry Potter</td>
                        <td>6/11/24</td>
                        <td>9/11/24</td>
                        <td>8/11/24</td>
                        <td>Done</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Finn Camacho</td>
                        <td>Harry Potter</td>
                        <td>6/11/24</td>
                        <td>9/11/24</td>
                        <td>8/11/24</td>
                        <td>Done</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Finn Camacho</td>
                        <td>Harry Potter</td>
                        <td>6/11/24</td>
                        <td>9/11/24</td>
                        <td>8/11/24</td>
                        <td>Done</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Finn Camacho</td>
                        <td>Harry Potter</td>
                        <td>6/11/24</td>
                        <td>9/11/24</td>
                        <td>8/11/24</td>
                        <td>Done</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Finn Camacho</td>
                        <td>Harry Potter</td>
                        <td>6/11/24</td>
                        <td>9/11/24</td>
                        <td>8/11/24</td>
                        <td>Done</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection