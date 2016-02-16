<!DOCTYPE HTML>
<html>
<head>
<link>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Link in the bootstrap css -->
<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
<!-- Link in javascript -->
    <script src="JS/home.js"></script>
    <link rel="stylesheet" href="CSS/home.css"
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body style="font-family: 'Montserrat', sans-serif;">

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navTop">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="." >Roadio</a>
        </div>
        <div class="navbar-collapse collapse" id="navTop">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" method="get" role="search" name="locationForm" id="locationForm" onsubmit="return validateLocationSearch()" action="locationSearch.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search a Location" id="locationSearch" name="locationSearch" id="srch-term">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" style="padding-bottom: 7px;"><span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>

<!-- Page content -->
<div class="container-fluid">
