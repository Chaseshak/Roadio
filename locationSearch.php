<?php include "templates/include/header.php"; ?>

<!-- Links in the styling for displaying website result "cards" -->
<link type="text/css" href="CSS/locationSearch.css">
<!-- first script stores the JSON data of results from server -->
<!-- Next Script links in the necessary JavaScript file which handles displaying the results -->
<script>fmData = JSON.parse('<?php echo json_encode($_POST['results']);?>') </script>
<script type="text/javascript" src="JS/locationSearch.js"></script>


<!-- Main container for results -->
<div class="container" id="container" style="padding-top: 60px;">
    <div class="row">
        <div class="col-md-12" align="center">FIRST ROW</div>
    </div>

</div>

<?php include "templates/include/footer.php"; ?>