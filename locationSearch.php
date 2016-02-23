<?php include "templates/include/header.php";

/**
 * Adds website to temp DB pending approval.
 */

?>

<!-- Links in the styling for displaying website result "cards" -->
<link rel="stylesheet" href="CSS/locationSearch.css">
<!-- first script stores the JSON data of results from server -->
<!-- Next Script links in the necessary JavaScript file which handles displaying the results -->
<script>fmData = JSON.parse('<?php echo json_encode($_POST['results']);?>') </script>
<script type="text/javascript" src="JS/locationSearch.js"></script>


<!-- Main container for results -->

<div class="container" style="padding-top: 60px;">
    <div class="row">
        <div class="col-md-3">
            <!-- Begin Filter sidebar -->
        <div id="lowerNav" class="panel panel-default"
             data-spy="affix" data-offset-top="60" data-offset-bottom="400">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <ul class="list-inline">
                    <li style="padding-top: 8px;"> <h3 style="display: inline;">Filter Results</h3> </li>
                    <li style="padding-top: 6px;"><button type="submit" class="btn btn-success">Update Filters</button></li>
                </ul>
            </div>
            <!-- Filters for genre container (Dynamically populated) -->
            <div class="panel-body" id ="panelFilter">
                <span data-toggle="collapse" href="#collapseFilters"
                    id="filterGlyph" class="glyphicon glyphicon-chevron-down pull-right"
                      aria-hidden="true" style="margin-top: 12px;" onclick="changeFilterIcon()"></span>
                <h4 data-toggle="collapse" href="#collapseFilters" onclick="changeFilterIcon()">Filter Genres</h4>
            </div> <!-- End container for filters by genre -->
            <div id="collapseFilters" class="panel-collapse collapse">
            </div>
            <div class="panel-body" id="panelFilter">
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
        <div class="col-md-9">
            <div class="container-fluid" id="containerResults" style="border: 3px solid #222222; border-radius: 5px; background-color: #F5F5F5; padding-top: 10px;">
                <!-- begin list result for displaying results -->
                <!-- Dynamically populated rows for displaying search results -->
        </div>
    </div>
</div>
    <!-- Modal for submittig website -->
    <div id="noSite" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="addSiteModal"></h4>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="callsignForm">Callsign</label>
                            <input type="text" class="form-control" id ="callsignForm" readonly>
                        </div>
                        <div class="form-group">
                            <label for="website">Website URL</label>
                            <input type="url" class="form-control" id="website">
                        </div>
                    <h5><strong>Thanks for helping make this site more complete!</strong></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for displaying KML Range docs -->
    <div id="rangeDoc" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="rangeHeader"></h4>
                </div>
                <div class="modal-body">
                    <div id="map">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php include "templates/include/footer.php"; ?>