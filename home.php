<?php include "templates/include/header.php" ?>
    <script src="JS/home.js"></script>
    <!-- Header font -->
    <link href='https://fonts.googleapis.com/css?family=Rubik:400,900' rel='stylesheet' type='text/css'>
<div class="container" style="padding-top: 60px; background-color: #FDF3E7;">
<div class="page-header" style="margin: 5px 0 5px;">
    <h1 style="font-family: font-family: 'Rubik', sans-serif;">Find Radio Stations near and along your driving route</h1>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 section-box">
                            <h3>
                                Search by Location<a id="locationSearchIcon" href="#"><span class="glyphicon glyphicon-search pull-right">
                                </span></a>
                            </h3>
                            <p>
                                Enter any location in the United States and see stations within your range!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 section-box">
                            <h3>
                                Route Search<a href="http://www.google.com" target="_blank"><span class="glyphicon glyphicon-new-window pull-right">
                                </span></a>
                            </h3>
                            <p>
                                Enter your start and end location and get radio stations along your route that you want to listen to!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 section-box">
                            <h3>
                                Share on Social Media
                                <span class="glyphicon glyphicon-share-alt pull-right" style="color: #337AB7"></span>
                            </h3>
                            <p>

                                If you love our application, help us spread the word by sharing our page on social media!
                            </p>
                            <!-- Social Media buttons -->
                            <a rel="canonical" href="https://twitter.com/share?url=http://www.google.com&text=Check out Roadio!" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                            <a href="https://www.facebook.com/dialog/feed?
                                          app_id=169879278202
                                          &display=popup&caption=An%20example%20caption
                                          &link=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fdialogs%2F
                                          &redirect_uri=https://developers.facebook.com/tools/explorer"
                               title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                            <a href="https://plus.google.com/share?url=" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <h4>Check out all of the Radio Stations we have in our database!</h4>
        <div id="map">
        </div>
    </div>
</div>
</div>


<?php include "templates/include/footer.php" ?>