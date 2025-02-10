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
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: #212529; 
            color: white;
        }

        .sidebar .nav-link {
            color: white;
        }

        .sidebar .nav-link:hover {
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
            min-height: calc(100vh - 56px); /* Adjust for footer height */
            position: relative;
            padding-bottom: 56px; /* Adjust for footer height */
        }

        .header {
            width: 100%;
            margin: 0;
            padding: 0;
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
                <h1 class="m-0">NIA PIMO</h1>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="/boxes" class="nav-link">Boxes</a></li>
                    <li class="nav-item"><a href="/folders" class="nav-link">Folders</a></li>
                    <li class="nav-item"><a href="/files" class="nav-link">Files</a></li>
                </ul>
            </nav>
            <header class="bg-dark text-white p-3 text-center header">
                <div class="container-fluid">
                    <h1>E-File Management System</h1>
                </div>
            </header>
            <main class="col-md-10 main-content ">
                @yield('content')
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
    </script>
</body>
</html>