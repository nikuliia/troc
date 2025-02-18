<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard</title>

    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/dashboard.css" rel="stylesheet">
    <!-- Favicons -->
    <style>
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
    </style>
</head>
<body>


<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Company name</a>
    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="bi"><use xlink:href="#list"/></svg>
            </button>
        </li>
    </ul>
</header>

<div class="container-fluid ">
    <div class="row mb-3">
        <!-- Sidebar start -->
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="sidebarMenuLabel">Troc</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="http://localhost/troc/admin/index.php">
                                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="http://localhost/troc/admin/annonce_index.php">
                                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                                Annonce
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Sidebar end -->

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
