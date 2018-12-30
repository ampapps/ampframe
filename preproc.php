<?php
/*
AMP Frame ver 1.0.1
preproc.php
Pre Process Scripting
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

//*start the session*//
if( empty( session_id() ) ){
    session_start();
}

//*manually set script root*//
#define('AFROOT', '/');

//*START Global Functions*//
function returnMenuLink( $route=null, $control=null, $kvp=null ){

    $return = AFURL;
    if( AFCLEANURL ){
        $return .= ( empty($route) ) ? '' : $route.'/';
        $return .= ( empty($control) ) ? '' : $control.'/';
        $return .= ( empty($kvp) ) ? '' : '?'.$kvp;
    }else{
        $return .= ( empty($route) ) ? '' : '?'.AFROUTE.'='.$route;
        $return .= ( empty($control) ) ? '' : '&'.AFCONTROL.'='.$control;
        $return .= ( empty($kvp) ) ? '' : '&'.$kvp;
    }

    return $return;

}
//*END Global Functions*//

?>
