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
    <p>
        <?php

            $data_arr = $_POST['data_arr'];
            if($data_arr){
                echo implode("|", $data_arr);
            }

        ?>
    </p>
</div>

<?php

include "templates/include/footer.php";
?>