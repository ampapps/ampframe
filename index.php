<?php
/*
!!!THIS FILE IS NOT SAFE TO MODIFY!!!

AMP Frame ver 1.0.0
index.php
Front End Controller

Copyright (C) 2018 AMP Apps www.ampapps.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

//*allow files to be included*//
define('AFALLOW', true);

//*include pre process scripting*//
if( is_file('preproc.php') ){
    include_once('preproc.php');
}

//*define the standard script root*//
if( !defined('AFROOT') ){
    define('AFROOT', str_replace("\\", '/', __DIR__.'/') );
}

//*handle configuration*//
include_once(AFROOT.'config/config.php');

//*start script initialization*//
$initFile = AFROOT.'config/init.php';
if( is_file($initFile) ){
    include_once($initFile);
}else{
    trigger_error('Initialization file <em>'.$initFile.'</em> not found<br>Check that the path is valid');
    die();
}

//*include post process scripting*//
if( is_file('postproc.php') ){
    include_once('postproc.php');
}

//*deliver the view*//
$afView->deliver();
?>
