<?php
/*
AMP Frame ver 1.0.0
Help Template
template/help/content/model.php
Model Help Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Model</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <p>The model communicates between a controller and a view.</p>
                        <p>It provides the methods available to the controller for the task to be performed and stores the results for the view to use.</p>
                        <p>Each model is designed to handle a specific job. The page model handles the templating jobs, the mysqli model handles data management and the error model handles errors.</p>
                        <p>AMP Frame supports loading multiple models with each request and the ability to only load the models needed for that request.</p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->
