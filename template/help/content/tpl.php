<?php
/*
AMP Frame ver 1.1.0
Help Template
template/help/content/tpl.php
Template System Help Content
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}
?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col"><h4 class="text-center">Template System</h4></div>
                </div><!-- row -->
                <div class="row">
                    <div class="col">
                        <p>The template system supports any number of layout designs so that designers can display what they want the way they want.</p>
                        <p>The template is loaded directly into the View so that it has access to all the available object's properties and methods using the $this psuedo-variable.</p>
                        <p class="font-weight-bold">Skins</p>
                        <p>Skins allow page content to be displayed with a different look or feel. The default pages come with a couple skins to demonstrate this feature.</p>
                        <p class="font-weight-bold">Adding a page to the default template</p>
                        <p>The template/ folder contains the available templates. In this example we will look at how to add a new page to the default/ template. We will be using the content file name of newpage.php, however you can name it whatever suits your needs.</p>
                        <p class="font-italic">1) Create the template/default/content/newpage.php file</p>
                        <p>The easiest way to do this is to make a copy of the template/default/content/empty.php file and name it newpage.php. You can then make whatever changes you want to this file to display the content specific to the new page.</p>
                        <p class="font-italic">2) Create the control/page/afc.newpage.php file</p>
                        <p>This is the control file for viewing this page. You can make a copy of the control/page/afc.empty.php file and name it afc.newpage.php.</p>
                        <p>In the constructor, set the $this->model->afmPage->page property to 'newpage'. This is the property used in the template to display the correct content.</p>
                        <pre>
                            <code>
    $this->model->afmPage->page = 'newpage';
                            </code>
                        </pre>
                        <p class="font-italic">3) Add the new page to the site menu</p>
                        <p>The main navigation menu for the site is defined in an array in the config/config.php file named $config['siteMenu']. Add a new array with the following values...</p>
                        <pre>
                            <code>
    array(
        'title' => 'New Page',
        'link' => returnMenuLink( 'page', 'newpage' ),
        'page' => 'newpage'
    ),
                            </code>
                        </pre>
                        <p>This will add a menu item titled 'New Page'. It will route to 'page' and use the 'newpage' controller. It will display as active when 'newpage' is the active page. It will align to the left, which is the default.</p>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- jumbotron -->
