<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="/assets/img/logo.png" alt="Brand" id="img-logo">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['user_id'])) : ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/login.php">Login</a>
                        </li>
                        <li>
                            <a href="/register.php">Registration</a>
                        </li>
                        <li>
                            <a href="/forgot.php">Forgot</a>
                        </li>
                    </ul>
                </li>
                <li class="disabled">
                    <a href="#">Logout</a>
                </li>
                <?php else : ?>
                <li>
                    <a href="/dashboard.php">Account</a>
                </li>
                <li>
                    <a href="/logout.php">Logout</a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<?php if (isset($_SESSION['user_id'])) : ?>
    <script src="/assets/js/main_dashboard.js"></script>
<?php else : ?>
<script src="/assets/js/main.js"></script>
<?php endif; ?>