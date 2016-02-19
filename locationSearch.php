<?php
include "templates/include/header.php";

/**
 * Created by PhpStorm.
 * User: chase
 * Date: 2/15/2016
 * Time: 10:37 PM
 */

//Store the searched location
?>
<!-- <script type="text/javascript" src="JS/locationSearch.js"</script> -->

   <!-- AIzaSyDkZuJdQ2-QEIvRr3Aal-WfEQjmCy9spFM -->
<div class="container">

        <?php

        $data_arr = $_POST['data_arr'];
        $results = $_POST['results'];
        //echo implode("|", $_POST['resultsEnum'][0]); // prints one row of data
        foreach($results as $result){
            ?></p> <?php
            echo implode("|", $result);
            ?></p><?php
        }

?>
</div>

<?php

include "templates/include/footer.php";
?>