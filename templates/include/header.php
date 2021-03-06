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

    <link rel="stylesheet" href="CSS/home.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Google maps library -->
    <script src="https://maps.google.com/maps/api/js"></script>
    <!-- Some extra styling for social media buttons -->
    <link rel="stylesheet" href="CSS/social-sharing.css">


<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <title><?php echo $_POST['title'] ?></title>
</head>

<body style="font-family: 'Montserrat', sans-serif; background-color: #C63D0F">

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container" style="padding-left:15px; padding-right: 15px; padding-top: 0;3">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navTop">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="." style="color: #FDF3E7">Roadio</a>
        </div>
        <div class="navbar-collapse collapse" id="navTop">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" style="color: #FDF3E7">About</a>
                </li>
            </ul>
            <form class="navbar-search pull-right form-inline" method="get" role="search" name="locationForm" id="locationForm" action="./?index.php">
                <div style="color: #FDF3E7; margin-top: 10px;">
                    Search Within Range of:
                    <?php
                        if(isset($_GET['locationSearch'])) {
                            ?>
                                <input data-toggle="tooltip" value ="<?php echo $_GET['locationSearch']?>" type="text" class="form-control" id="locationSearch"  name="locationSearch" required>
                            <?php
                        } else{

                       ?>
                        <input style="margin-left: 5px; width: 225px" type="text" class="form-control" placeholder="Enter a Location" id="locationSearch"  name="locationSearch" required>
                    <?php
                        }
                    ?>

                        <button class="btn btn-default" type="submit" style="padding-bottom: 6px;"><span class="glyphicon glyphicon-search"></span>
                        </button>
                </div>
            </form>
        </div>
    </div>
</nav>

<!-- Page content -->

