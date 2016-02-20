<?php include "templates/include/header.php"; ?>

<!-- Links in the styling for displaying website result "cards" -->
<link type="text/css" href="CSS/locationSearch.css">
<!-- first script stores the JSON data of results from server -->
<!-- Next Script links in the necessary JavaScript file which handles displaying the results -->
<script>fmData = JSON.parse('<?php echo json_encode($_POST['results']);?>') </script>

<script type="text/javascript" src="JS/locationSearch.js"></script>


<div class="container">

        <?php

        $data_arr = $_POST['data_arr'];
        $results = $_POST['results'];
        //echo implode("|", $_POST['resultsEnum'][0]); // prints one row of data
        ?>
        <div class="jumbotron">
            <p id="test"></p>
            <button class="btn-default" onclick="addData()">Push Me!</button>
        </div>
        <?php
        foreach($results as $result){
            ?>
            </p>
            <?php echo implode("|", $result);
            ?>
            </p>
            <?php
        }

?>
</div>

<?php

include "templates/include/footer.php";
?>