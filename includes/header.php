<?php require 'dbaccess.php'; ?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/screen.css">
    <title>Biblioweb</title>
</head>
<body>

<header>
    <div class="px-3 py-2 bg-dark text-white border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <img src ="img/logo-Biblioweb.jpeg" alt="logo du header" title="LOGO" class="logo-header">
                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="#" class="nav-link text-secondary">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"/></svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"/></svg>
                            Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="px-3 py-2 bg-dark mb-3">
        <div class="container d-flex flex-wrap justify-content-between">
            <form class="text-start" action="index.php" method="get">
                <input type="text" class="form-control form-control-dark" id="input" placeholder="Rechercher un auteur..." aria-label="Search" name="query">
                <input type="submit" class="btn btn-outline-light me-2" value="Rechercher">
            </form>

            <div class="text-end">
                <button type="button" class="btn btn-light text-dark me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
        </div>
    </div>
</header>
