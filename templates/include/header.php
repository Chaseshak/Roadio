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
    <title><?php echo $_POST['title'] ?></title>
</head>

<body style="font-family: 'Montserrat', sans-serif; background-color: #686766">

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
            <form class="navbar-search pull-right form-inline" method="get" role="search" name="locationForm" id="locationForm" action="./?index.php">
                <div style="color: #ffffff; margin-top: 10px;">
                    Search Stations Near:
                    <?php $locationHolder = "Enter a Location";
                        if(isset($_GET['locationSearch'])) $locationHolder = $_GET['locationSearch']
                    ?>
                    <input type="text" class="form-control" placeholder="<?php echo $locationHolder ?>"" id="locationSearch"  name="locationSearch" required>
                    <select class="form-control c-select" id="rangeSelect" name="rangeSelect" >
                        <option value="100">100 miles</option>
                        <option value="75">75 mi</option>
                        <option value="50">50 mi</option>
                        <option value="40">40 mi</option>
                        <option value="30">30 mi</option>
                        <option value="20">20 mi</option>
                        <option value="10">10 mi</option>
                    </select>
                        <button class="btn btn-default" type="submit" style="padding-bottom: 7px;"><span class="glyphicon glyphicon-search"></span>
                        </button>
                </div>
            </form>
        </div>
    </div>
</nav>

<!-- Page content -->
<div class="container" style="padding-top: 65px;">
