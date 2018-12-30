<?php
/*
AMP Frame ver 1.0.0
Help Template
template/help/content/mvcr.php
MVC+R Help Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Model - View - Controller + Router</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <p>All user requests are sent to the frameworks index file, known as the front end controller, triggering a route and specifying a controller.</p>
                        <p>The route determines which control set to use which determine the models, controller and view files to load.</p>
                        <p>The controller sets up and prepares the model to communicate with the view.</p>
                        <p>The view delivers the results from the request back to the user.</p>
                        <p>It starts all over again with the next request.</p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->
