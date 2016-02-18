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
            if($data_arr){

               foreach($results as $row) {
                   ?>
                   <p> <?php
                   echo implode("|", $row) . "\n";
                    ?></p> <?php
               }
            }

        ?>

</div>

<?php

include "templates/include/footer.php";
?>