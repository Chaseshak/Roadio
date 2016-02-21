<?php include "templates/include/header.php"; ?>

<!-- Links in the styling for displaying website result "cards" -->
<link rel="stylesheet" href="CSS/locationSearch.css">
<!-- first script stores the JSON data of results from server -->
<!-- Next Script links in the necessary JavaScript file which handles displaying the results -->
<script>fmData = JSON.parse('<?php echo json_encode($_POST['results']);?>') </script>
<script type="text/javascript" src="JS/locationSearch.js"></script>


<!-- Main container for results -->

<div class="container-fluid" style="padding-top: 60px;">
    <div class="row">
        <div class="col-md-3">
        <div id="sidebar" style="padding-left: 10px;" class="panel panel-default"
             data-spy="affix" data-offset-top="60" data-offset-bottom="400">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3>Filter Results</h3></div>
            <div class="panel-body">
                <span id="filterGlyph" class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true" style="margin-top: 12px;"></span>
                <h4 data-toggle="collapse" href="#collapseFilters" onclick="changeFilterIcon()">Filter Genres</h4>
            </div>
            <div id="collapseFilters" class="panel-collapse collapse">
            </div>
            <div class="panel-body">
                <span id="filterGlyph2" class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true" style="margin-top: 12px;"></span>
                <h4 data-toggle="collapse" href="#collapseAM_FM" onclick="changeFM_AMIcon()">Show AM/FM</h4>
            </div>
            <div id="collapseAM_FM" class="panel-collapse collapse">

            </div>
        </div>
       </div>
        <div class="col-md-9" align="center">
            <div class="container-fluid" id="container"
                 style="border: 3px solid #222222;
                 border-radius: 5px; background-color: #F5F5F5;
                 ">

            </div>
        </div>

    </div>

</div>

<?php include "templates/include/footer.php"; ?>