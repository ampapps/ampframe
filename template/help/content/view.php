<?php
/*
AMP Frame ver 1.0.0
Help Template
template/help/content/view.php
View Help Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">View</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <p>The view delivers the results of a request back to the user.</p>
                        <p>It communicates with the model for the available data and determines how that data is presented.</p>
                        <p>The page view, which ships with AMP Frame, loads the requested template and provides any dynamic content for the page being displayed.</p>
                        <p>It is important not to confuse the view as only delivering markup. A seperate view would be used for delivering downloadable content, API responses and RSS feeds, just to name a few.</p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->
