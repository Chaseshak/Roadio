<?php
include "include/header.php";
/**
 * Created by PhpStorm.
 * User: chase
 * Date: 2/15/2016
 * Time: 10:37 PM
 */

//Store the searched location
?>

   <!-- AIzaSyDkZuJdQ2-QEIvRr3Aal-WfEQjmCy9spFM -->
<div class="row">
    <div class="col-md-12">
        <div class="embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDkZuJdQ2-QEIvRr3Aal-WfEQjmCy9spFM&q=<?php $_GET['locationSearch']?>"></iframe>
            <p>https://www.google.com/maps/embed/v1/place?key=AIzaSyDkZuJdQ2-QEIvRr3Aal-WfEQjmCy9spFM&q=<?php $_GET['locationSearch'];?></p>
        </div>
    </div>
</div>

<?php

include "include/footer.php";
?>