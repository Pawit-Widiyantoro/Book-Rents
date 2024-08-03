@extends('dashboard.layouts.main')

@section('content')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="row">

                        <!-- Books Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="/dashboard/books" class="text-decoration-none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Books</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $book_count }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Categories Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="/dashboard/categories" class="text-decoration-none">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Categories</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category_count }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- User Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="/dashboard/users" class="text-decoration-none">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Users</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user_count }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rent Logs</h6>
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
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

@endsection