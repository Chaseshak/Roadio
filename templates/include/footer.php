
<footer>
    <div class="navbar navbar-inverse navbar-bottom" style="font-size: 10px; margin-top: 10px; margin-bottom: 0; border-radius: 0">
        <div class="container">
            <div class="navbar-collapse collapse" id="footer-body">
                <ul class="nav navbar-nav">
                    <li><a href="#">About Roadio</a></li>
                    <li><a href="mailto:roadio@gmail.com?Subject=Roadio%20Contact">Contact Us</a></li>
                    <li><a href="#">Submit a Bug</a></li>
                    <li><a href="#privacyPolicy" data-toggle="modal" target="#privacyPolicy">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Modal Privacy Policy -->
<div id="privacyPolicy" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 60%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Roadio Privacy Policy</h4>
            </div>
            <div class="modal-body">
                <?php include("privacypolicy.htm") ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal Submit Feedback -->

<div id="submitFeedback" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Submit Feedback</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>