<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paperz Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .dashboard-container {
            padding: 30px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: #4a6fdc;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            font-weight: bold;
        }
        .stats-card {
            text-align: center;
            padding: 15px;
        }
        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #4a6fdc;
        }
        .stats-label {
            font-size: 1rem;
            color: #6c757d;
        }
        .sidebar {
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar-link {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            transition: all 0.3s;
        }
        .sidebar-link:hover, .sidebar-link.active {
            color: white;
            background-color: #4a6fdc;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .icon-container {
            display: inline-block;
            width: 30px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h3 class="text-center mb-4">Paperz Admin</h3>
                <div class="d-flex flex-column">
                    <a href="#" class="sidebar-link active">
                        <span class="icon-container"><i class="bi bi-speedometer2"></i></span> Dashboard
                    </a>
                    <a href="#" class="sidebar-link">
                        <span class="icon-container"><i class="bi bi-building"></i></span> Colleges
                    </a>
                    <a href="#" class="sidebar-link">
                        <span class="icon-container"><i class="bi bi-book"></i></span> Courses
                    </a>
                    <a href="#" class="sidebar-link">
                        <span class="icon-container"><i class="bi bi-journal-text"></i></span> Units
                    </a>
                    <a href="#" class="sidebar-link">
                        <span class="icon-container"><i class="bi bi-file-earmark-text"></i></span> Past Papers
                    </a>
                    <a href="#" class="sidebar-link">
                        <span class="icon-container"><i class="bi bi-people"></i></span> Users
                    </a>
                    <a href="#" class="sidebar-link mt-auto">
                        <span class="icon-container"><i class="bi bi-box-arrow-right"></i></span> Logout
                    </a>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <span class="navbar-brand">Dashboard</span>
                        <div class="ms-auto">
                            <span class="me-3">Welcome, System Admin</span>
                        </div>
                    </div>
                </nav>
                
                <div class="dashboard-container">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card stats-card">
                                <div class="stats-number">0</div>
                                <div class="stats-label">Colleges</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stats-card">
                                <div class="stats-number">0</div>
                                <div class="stats-label">Courses</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stats-card">
                                <div class="stats-number">0</div>
                                <div class="stats-label">Units</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stats-card">
                                <div class="stats-number">0</div>
                                <div class="stats-label">Past Papers</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    Recent Past Papers
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Unit</th>
                                                <th>Year</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="text-center">No past papers uploaded yet.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    System Stats
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>Total Users:</span>
                                        <span>1</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>Storage Used:</span>
                                        <span>0 MB</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>System Status:</span>
                                        <span class="text-success">Online</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mt-4">
                                <div class="card-header">
                                    Quick Actions
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary">Add New College</button>
                                        <button class="btn btn-primary">Add New Course</button>
                                        <button class="btn btn-primary">Add New Unit</button>
                                        <button class="btn btn-primary">Upload Past Paper</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
