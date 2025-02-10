<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-File Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.bootstrap5.min.css">
    <style>
          .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: #212529;
            color: white;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: white;
            display: flex;
            align-items: center;
            padding: 10px 15px;
        }

        .sidebar .nav-link:hover, .dropdown-item:hover {
            background-color: #002244;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: calc(100vh - 56px); 
        }

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

        .sidebar h1 {
            text-align: center;
            width: 100%;
        }

        .content-wrapper {
            min-height: calc(100vh - 56px); 
            position: relative;
            padding-bottom: 56px; 
        }

        .header {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .dropdown-menu {
            background-color: #212529;
            width: 100%;
            border: none;
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-item:hover {
            background-color: #002244;
        }
    </style>
</head>
<body>
    <div class="container-fluid content-wrapper">
        <div class="row">
            <nav class="col-md-2 sidebar">
                <header class="bg-dark text-white p-3 text-center d-flex justify-content-center align-items-center w-100">
                    <img src="{{ asset('storage/images/nia-logo.png') }}" alt="Logo" class="me-2" style="height: 100px;">
                </header>
                <h1 class="m-0 text-center">NIA PIMO</h1>
                <ul class="nav flex-column">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle w-100 text-start" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Irrigator's Association
                        </a>
                        <ul class="dropdown-menu w-100 border-0" aria-labelledby="navbarDropdown" data-bs-auto-close="outside">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addBoxModal" data-url="{{ url('box/index') }}">Add Box</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addFolderModal" data-url="{{ url('folder/index') }}">Add Folder</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addFileModal" data-url="{{ url('file/index') }}">Add Files</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
    
            {{-- <header class="bg-dark text-white p-3  header">
                <div class="container-fluid">
                    <h1>Irrigator's Association</h1>
                </div>
            </header> --}}
            <main class="col-md-10 main-content">
                @yield('content')
                <div class="container-fluid">
                    <h1>Irrigator's Association</h1>
                </div>
                <div class="table-responsive bg-white p-3 rounded">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Start date</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th><input type="text" placeholder="Search Name" /></th>
                                <th><input type="text" placeholder="Search Position" /></th>
                                <th><input type="text" placeholder="Search Office" /></th>
                                <th><input type="text" placeholder="Search Start date" /></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>2011/04/25</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>2011/07/25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
            
            @include('layouts.footer')
        </div>
    </div>
    {{-- box modal --}}
    <div class="modal fade" id="addBoxModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Box</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('boxes.store') }}">
                        @csrf
                        <input type="text" name="box_name" class="form-control" placeholder="Box Name">
                        <textarea name="box_description" class="form-control mt-2" placeholder="Box Description"></textarea>
                        <button type="submit" class="btn btn-success mt-2">Add Box</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- folder modal --}}
    <div class="modal fade" id="addFolderModal" tabindex="-1" aria-labelledby="addFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFolderModalLabel">Add Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('folders.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="folder_name" class="form-label">Folder Name</label>
                            <input type="text" class="form-control" name="folder_name" id="folder_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="box_id" class="form-label">Select Box</label>
                            <select class="form-select" name="box_id" id="box_id" required>
                                @foreach($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->box_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Folder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    <!-- File Modal -->
    <div class="modal fade" id="addFileModal" tabindex="-1" aria-labelledby="addFileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFileModalLabel">Add File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="ia_name" class="form-label">IA Name</label>
                            <input type="text" class="form-control" name="ia_name" id="ia_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Project Name</label>
                            <input type="text" class="form-control" name="project_name" id="project_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="folder_id" class="form-label">Select Folder</label>
                            <select class="form-select" name="folder_id" id="folder_id" required>
                                @foreach($folders as $folder)
                                    <option value="{{ $folder->id }}">{{ $folder->folder_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date_received" class="form-label">Date Received</label>
                            <input type="date" class="form-control" name="date_received" id="date_received" required>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File Upload</label>
                            <input type="file" class="form-control" name="file" id="file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload File</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example thead tr:eq(1) th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });
            var table = $('#example').DataTable({
                colReorder: true
            });

            table.columns().every(function () {
                var that = this;

                $('input', this.header()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });

                $(document).ready(function() {
            $('.dropdown-menu').on('click', function(event) {
                event.stopPropagation(); // Prevent the dropdown from closing when clicking inside it
            });
        });

    </script>
</body>
</html>