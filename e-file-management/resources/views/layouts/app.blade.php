<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-File Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <header class="bg-dark text-white p-3 text-center">
        </header>
        <div class="row">
            <nav class="col-md-2 bg-light sidebar">
                <span> <img src="{{ asset('storage/images/nia-logo.png') }}" alt="Logo" class="mb-2" style="height: 50px;"><h1>NIA PIMO</h1></span>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="/boxes" class="nav-link">Boxes</a></li>
                    <li class="nav-item"><a href="/folders" class="nav-link">Folders</a></li>
                    <li class="nav-item"><a href="/files" class="nav-link">Files</a></li>
                </ul>
            </nav>
            <main class="col-md-10 main-content">
                @yield('content')
            </main>
        </div>
        <footer class="bg-dark text-white text-center p-2">
            <p>&copy; 2025 NIA PIMO Institutional Development Unit File System Management</p>
        </footer>
    </div>
</body>
</html>
