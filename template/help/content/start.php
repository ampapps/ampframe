<?php
/*
AMP Frame ver 1.0.0
Help Template
template/help/content/start.php
Flow Start Help Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Request Flow Start</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <p>All requests are sent to AMP Frame's front end controller, the index.php file.</p>
                        <p>The constant AFALLOW is defined so that included files know they are being loaded by the framework.</p>
                        <p>A pre-processing file, preproc.php, is included where the session is started and in case any scripting needs to be handled before the framework's process begins.</p>
                        <p>The constant AFROOT is defined with the full path on the server to the framework's files. If this technique does not work, the AFROOT can be set manually in the pre-processing file.</p>
                        <p>The configuration system is then started using the config/config.php file.</p>
                        <p>The framework's initialization is then handled in the config/init.php file</p>
                        <p>The error model is loaded and set to handle errors.</p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->
