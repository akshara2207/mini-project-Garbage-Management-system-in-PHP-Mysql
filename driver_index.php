<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Driver Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: "Raleway", sans-serif;
        }

        #wrapper {
            padding-left: 0;
        }

        #page-wrapper {
            width: 100%;
            padding: 0;
            background-color: #fff;
        }

        .top-nav {
            padding: 0 15px;
        }

        .top-nav>li {
            display: inline-block;
            float: left;
        }

        .top-nav>li>a {
            padding-top: 20px;
            padding-bottom: 20px;
            line-height: 20px;
            color: #fff;
        }

        .top-nav>li>a:hover,
        .top-nav>li>a:focus,
        .top-nav>.open>a,
        .top-nav>.open>a:hover,
        .top-nav>.open>a:focus {
            color: #fff;
            background-color: #1a242f;
        }

        .navbar-inverse {
            background-color: #37517e;
            border-color: #37517e;
        }

        .side-nav {
            position: fixed;
            top: 60px;
            left: 225px;
            width: 225px;
            margin-left: -225px;
            border: none;
            border-radius: 0;
            border-top: 1px rgba(0,0,0,.5) solid;
            overflow-y: auto;
            background-color: #37517e;
            bottom: 0;
            overflow-x: hidden;
            padding-bottom: 40px;
        }

        .side-nav>li>a {
            width: 225px;
            border-bottom: 1px rgba(0,0,0,.3) solid;
        }

        .side-nav li a:hover,
        .side-nav li a:focus {
            outline: none;
            background-color: #1a242f !important;
        }

        .navbar-brand {
            padding: 5px 15px;
        }

        .panel.panel-blue {
            border-radius: 0;
            box-shadow: 0 0 10px #888;
            border-color: #266590;
        }

        .panel.panel-blue .panel-heading {
            border-radius: 0;
            color: #FFF;
            background-color: #266590;
        }

        .panel.panel-blue .panel-body {
            background-color: #F2F2F2;
            color: #4D4D4D;
        }

        body, h1 {
            font-family: "Raleway", sans-serif;
        }

        body, html {
            height: 100%;
        }

        .bgimg {
            background-image: url('admin.jpg');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#Dashboard" data-toggle="collapse" data-target="#submenu-1">
                        <i class="fa fa-fw fa-search"></i><mark> Dashboard</mark>
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                </li>

                <li>
                    <a href="driver_view_complaint.php"><i class="fa fa-fw fa-paper-plane-o"></i>User Complaints</a>
                </li>
                <li>
                    <a href="view_work.php"><i class="fa fa-fw fa-paper-plane-o"></i>View work</a>
                </li>

                <li>
                    <a href="logout-driver.php"><i class="fa fa-fw fa fa-question-circle"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content Goes Here -->

</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
