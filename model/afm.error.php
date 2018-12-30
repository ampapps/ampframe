<?php
/*
!!!THIS FILE IS NOT SAFE TO MODIFY!!!

AMP Frame ver 1.0.0
model/afm.error.php
Error Handling Model
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

class afmError{

    public function __construct( $arg=null ){}

    public function error($level, $message, $file, $line){

        echo '<strong>Error:</strong> '.$message.'<br>';
        echo '<strong>File:</strong> '.$file.'<br>';
        echo '<strong>Line:</strong> '.$line.'<br>';
        if( $level == E_ERROR or $level == E_USER_ERROR ){
            echo 'Ending process';
            die();
        }

    }

}
?>
