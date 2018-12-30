<?php
/*
AMP Frame ver 1.0.0
Help Template
template/help/content/result.php
Results Flow Help Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Results Flow</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <p>A summary of the flow is...</p>
                        <p>A request came in to be routed to the help control set for the flow page controller.</p>
                        <p>The router loaded the traits, models, controller and view needed to return results for the request.</p>
                        <p>The controller told the model what whas needed, including the sub menu you have been using to follow the flow.</p>
                        <p>The model made the data available to the view.</p>
                        <p>The view delivered the results.</p>
                        <p>In our example, it loaded up the help template and the flow page content and displayed it in the browser.</p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->
