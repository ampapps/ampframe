<?php
/*
AMP Frame ver 1.0.0
Help Template
template/help/content/routing.php
Routing Flow Help Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Routing Flow</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <p>Routing is started in the route/trigger.php file.</p>
                        <p>The route request key, as seen in the URL, is afrte, which can be changed in the configuration settings if you want to specify a different name.</p>
                        <p>The value, as seen in the URL, is help, which is requesting the the help routing set which is in the route/help.php file.</p>
                        <p>This routing set defines the traits, models, view and... based on the controller request key, afcnt, it has in our example requested the flow page controller which is the control/help/afc.flow.php file.</p>
                        <p>We return to the config/init.php file where the routing model is loaded with the data passed from the routing set.</p>
                        <p>Any traits specified are loaded so that they are available to the other objects.</p>
                        <p>The models specified are loaded into the system.</p>
                        <p>The controller is loaded into the system. At this point, the controller does whatever work it needs to do to set up the model.</p>
                        <p>Finally the view is loaded and control is returned to the framework's index.php file.</p>
                        <p>Any post processing is handled in the postproc.php file.</p>
                        <p>The view is then instructed to deliver its results to the user.</p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->
