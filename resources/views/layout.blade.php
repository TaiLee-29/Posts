<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>
<body>

<main class="container">
    <div class="bg-light p-5 rounded mt-3">
        <h1>Posts by all authors</h1>
        <a class="btn btn-lg btn-primary" href="/" role="button">List</a>
    </div>
    <div>@yield('paginator')</div>
    <div><p>@yield('content')</p> </br> </br></div>
    <div></div>
</main>
<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        @guest()<a class="navbar-brand" href="/auth/login">Login</a>@endguest
            @auth()<a class="navbar-brand" href="/auth/logout">Logout</a>@endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/tag/list">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category/list">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Posts</a>
                </li>

            </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
