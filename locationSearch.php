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
            <!-- Begin Filter sidebar -->
        <div id="sidebar" class="panel panel-default"
             data-spy="affix" data-offset-top="60" data-offset-bottom="400">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <ul class="list-inline">
                    <li style="padding-top: 8px;"> <h3 style="display: inline;">Filter Results</h3> </li>
                    <li class="pull-right" style="padding-top: 6px;"><button type="submit" class="btn btn-success">Update Filters</button></li>
                </ul>
            </div>
            <!-- Filters for genre container (Dynamically populated) -->
            <div class="panel-body">
                <span data-toggle="collapse" href="#collapseFilters"
                    id="filterGlyph" class="glyphicon glyphicon-chevron-down pull-right"
                      aria-hidden="true" style="margin-top: 12px;" onclick="changeFilterIcon()"></span>
                <h4 data-toggle="collapse" href="#collapseFilters" onclick="changeFilterIcon()">Filter Genres</h4>
            </div> <!-- End container for filters by genre -->
            <div id="collapseFilters" class="panel-collapse collapse">
            </div>
            <div class="panel-body">
                <span id="filterGlyph2" data-toggle="collapse" href="#collapseAM_FM" onclick="changeFM_AMIcon()"
                      class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true" style="margin-top: 12px;"></span>
                <h4 data-toggle="collapse" href="#collapseAM_FM" onclick="changeFM_AMIcon()">Show AM/FM</h4>
            </div>
            <!-- Filters and dropdown for AM/FM filter -->
            <div id="collapseAM_FM" class="panel-collapse collapse">
                <div class="checkbox" style="padding-left: 10px;">
                    <input type="checkbox" id="onlyFM" style="margin-left: 0">
                    <label for="onlyFM">Include FM</label>
                </div>
                <div class="checkbox" style="padding-left: 10px;">
                    <input type="checkbox" id="onlyAM" style="margin-left: 0">
                    <label for="onlyAM">Include AM</label>
                </div>
            </div> <!-- End filters for AM/FM -->
        </div> <!-- End filter sidebar -->
       </div>
        <!-- Container for search results (dynamically populated -->
        <div class="col-md-9" align="center">
            <div class="container-fluid" id="container" style="border: 3px solid #222222; border-radius: 5px; background-color: #F5F5F5; padding-top: 10px;">
                <!-- begin list result for displaying results -->
                <div class="row">
                    <!-- Display the icon -->
                    <div class="hidden-xs col-sm-3" style="padding: 0">
                        <img src="Resources/radioIcon.png" style="max-height: 140px; max-width: 134px;">
                    </div>
                    <div class="col-xs-4 col-sm-3" style="padding: 0">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Callsign:</strong> WKLH
                            </li>
                            <li class="list-group-item">
                                <strong>Frequency:</strong> 88.9 MHz
                            </li>
                            <li class="list-group-item">
                                <strong>Location: </strong>Baraboo, WI
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-sm-3" style="padding: 0">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Callsign:</strong> WKLH
                            </li>
                            <li class="list-group-item">
                                <strong>Frequency:</strong> 88.9 MHz
                            </li>
                            <li class="list-group-item">
                                <strong>Location: </strong>Baraboo, WI
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-sm-3" style="padding-right: 10px; padding-left:0px;">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Callsign:</strong> WKLH
                            </li>
                            <li class="list-group-item">
                                <strong>Frequency:</strong> 88.9 MHz
                            </li>
                            <li class="list-group-item">
                                <strong>Location: </strong>Baraboo, WI
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-location">
                <div class="row">
                    <!-- Display the icon -->
                    <div class="hidden-xs col-sm-3" style="padding: 0">
                        <img src="Resources/radioIcon.png" style="max-height: 140px; max-width: 134px;">
                    </div>
                    <div class="col-xs-4 col-sm-3" style="padding: 0">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Callsign:</strong> WKLH
                            </li>
                            <li class="list-group-item">
                                <strong>Frequency:</strong> 88.9 MHz
                            </li>
                            <li class="list-group-item">
                                <strong>Location: </strong>Baraboo, WI
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-sm-3" style="padding: 0">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Callsign:</strong> WKLH
                            </li>
                            <li class="list-group-item">
                                <strong>Frequency:</strong> 88.9 MHz
                            </li>
                            <li class="list-group-item">
                                <strong>Location: </strong>Baraboo, WI
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-sm-3" style="padding-right: 10px; padding-left:0px;">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Callsign:</strong> WKLH
                            </li>
                            <li class="list-group-item">
                                <strong>Frequency:</strong> 88.9 MHz
                            </li>
                            <li class="list-group-item">
                                <strong>Location: </strong>Baraboo, WI
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php include "templates/include/footer.php"; ?>