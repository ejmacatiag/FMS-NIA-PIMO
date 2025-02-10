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
            background-color: #0e3257;
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
            background-color: #082f55;
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
            background-color: #0a2139;
            width: 100%;
            border: none;
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-item:hover {
            background-color: #659acf;
        }

        .dataTables_wrapper {
            box-shadow: 0 8px 16px rgba(9, 16, 87, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .dataTables_wrapper .dataTables_filter input {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dataTables_wrapper .dataTables_paginate {
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid content-wrapper">
        <div class="row">
            <nav class="col-md-2 sidebar">
                <header class="text-white p-3 text-center d-flex justify-content-center align-items-center w-100">
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
                                <th>Start Date</th>
                                <th>Salary</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                            </tr>
                            <tr>
                                <th><input type="text" class="column-search" placeholder="Search Name"></th>
                                <th><input type="text" class="column-search" placeholder="Search Position"></th>
                                <th><input type="text" class="column-search" placeholder="Search Office"></th>
                                <th><input type="text" class="column-search" placeholder="Search Start Date"></th>
                                <th><input type="text" class="column-search" placeholder="Search Salary"></th>
                                <th><input type="text" class="column-search" placeholder="Search Department"></th>
                                <th><input type="text" class="column-search" placeholder="Search Email"></th>
                                <th><input type="text" class="column-search" placeholder="Search Phone"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>IT</td>
                                <td>tiger.nixon@example.com</td>
                                <td>(123) 456-7890</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                                <td>Finance</td>
                                <td>garrett.winters@example.com</td>
                                <td>(987) 654-3210</td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>2009/01/12</td>
                                <td>$86,000</td>
                                <td>Documentation</td>
                                <td>ashton.cox@example.com</td>
                                <td>(456) 789-1234</td>
                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>Senior JavaScript Developer</td>
                                <td>Edinburgh</td>
                                <td>2012/03/29</td>
                                <td>$433,060</td>
                                <td>Development</td>
                                <td>cedric.kelly@example.com</td>
                                <td>(321) 654-9870</td>
                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>2008/11/28</td>
                                <td>$162,700</td>
                                <td>Finance</td>
                                <td>airi.satou@example.com</td>
                                <td>(789) 123-4567</td>
                            </tr>
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>2012/12/02</td>
                                <td>$372,000</td>
                                <td>IT</td>
                                <td>brielle.williamson@example.com</td>
                                <td>(654) 321-9876</td>
                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>2012/08/06</td>
                                <td>$137,500</td>
                                <td>Sales</td>
                                <td>herrod.chandler@example.com</td>
                                <td>(852) 963-7410</td>
                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td>2010/10/14</td>
                                <td>$327,900</td>
                                <td>IT</td>
                                <td>rhona.davidson@example.com</td>
                                <td>(951) 753-2580</td>
                            </tr>
                            <tr>
                                <td>Colleen Hurst</td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>2009/09/15</td>
                                <td>$205,500</td>
                                <td>Development</td>
                                <td>colleen.hurst@example.com</td>
                                <td>(147) 258-3690</td>
                            </tr>
                            <tr>
                                <td>Sonya Frost</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>2008/12/13</td>
                                <td>$103,600</td>
                                <td>Engineering</td>
                                <td>sonya.frost@example.com</td>
                                <td>(369) 147-2580</td>
                            </tr>
                            <tr>
                                <td>Jena Gaines</td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>2008/12/19</td>
                                <td>$90,560</td>
                                <td>Administration</td>
                                <td>jena.gaines@example.com</td>
                                <td>(753) 951-8520</td>
                            </tr>
                            <tr>
                                <td>Quinn Flynn</td>
                                <td>Support Lead</td>
                                <td>Edinburgh</td>
                                <td>2013/03/03</td>
                                <td>$342,000</td>
                                <td>Support</td>
                                <td>quinn.flynn@example.com</td>
                                <td>(258) 369-1470</td>
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
                            {{-- <select class="form-select" name="box_id" id="box_id" required>
                                @foreach($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->box_name }}</option>
                                @endforeach
                            </select> --}}
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
                            {{-- <select class="form-select" name="folder_id" id="folder_id" required>
                                @foreach($folders as $folder)
                                    <option value="{{ $folder->id }}">{{ $folder->folder_name }}</option>
                                @endforeach
                            </select> --}}
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
    <script src="https://cdn.datatables.net/colresize/1.0.0/js/dataTables.colResize.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                colReorder: false, 
                colResize: true,
                fixedHeader: true, 
                orderCellsTop: true, 
                paging: true, 
                searching: true, 
                autoWidth: false, 
                retrieve: true
            });

            // Move the search inputs to the correct row
            $('#example thead tr:eq(1) th').each(function (i) {
                var title = $('#example thead tr:eq(0) th').eq(i).text();
                $(this).html('<input type="text" class="column-search" placeholder="Search ' + title + '">');
            });

            // Apply column search
            $('.column-search').on('keyup change', function () {
                var colIndex = $(this).parent().index();
                table.column(colIndex).search(this.value).draw();
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