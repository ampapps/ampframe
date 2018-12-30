<?php
/*
!!!THIS FILE IS NOT SAFE TO MODIFY!!!

AMP Frame ver 1.0.0
model/afm.cleanurl.php
Clean URL Model
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

class afmCleanURL{

    public $folder;

    protected $map;

    public function __construct( $map, $folder=null ){

        $this->map = ( is_array($map) ) ? $map : array();
        $this->folder = $folder;
        $_REQUEST[AFROUTE] = ( empty($_REQUEST[AFROUTE]) ) ? null : $_REQUEST[AFROUTE];
        $_REQUEST[AFCONTROL] = ( empty($_REQUEST[AFCONTROL]) ) ? null : $_REQUEST[AFCONTROL];

    }

    public function cleanSimple( $route=null ){

        if( empty($_REQUEST[AFROUTE]) AND !empty($route) ){
            $_REQUEST[AFROUTE] = $route;
		}

        $urlParts = parse_url($_SERVER['REQUEST_URI']);

        $reqPath = str_replace('\\','/',$urlParts['path']);
        $reqPath = str_replace($this->folder,'',$reqPath);
        $reqParts = explode('/',$reqPath);

        if( strlen($reqParts[0]) == 0 ){
            array_shift($reqParts);
        }
        $lastPart = count($reqParts)-1;
        if( strlen($reqParts[$lastPart]) == 0 ){
            array_pop($reqParts);
        }

        foreach( $reqParts as $key=>$part ){

            $part = urldecode($part);
            switch($key){
                case 0:
                    $_REQUEST[AFCONTROL] = ( array_key_exists($part,$this->map) ) ? $this->map[$part] : $part;
                    break;
                default:
                    if( array_key_exists($key,$this->map) ){
                        $_REQUEST[$this->map[$key]] = $part;
                    }
                    break;
            }

        }

    }

    public function cleanComplex(){

        $urlParts = parse_url($_SERVER['REQUEST_URI']);

        $reqPath = str_replace('\\','/',$urlParts['path']);
        $reqPath = str_replace($this->folder,'',$reqPath);
        $reqParts = explode('/',$reqPath);

        if( strlen($reqParts[0]) == 0 ){
            array_shift($reqParts);
        }
        $lastPart = count($reqParts)-1;
        if( strlen($reqParts[$lastPart]) == 0 ){
            array_pop($reqParts);
        }

        foreach( $reqParts as $key=>$part ){

            $part = urldecode($part);
            switch($key){
                case 0:
                    $_REQUEST[AFROUTE] = ( array_key_exists($part,$this->map) ) ? $this->map[$part] : $part;
                    break;
                case 1:
                    $_REQUEST[AFCONTROL] = ( array_key_exists($part,$this->map) ) ? $this->map[$part] : $part;
                    break;
                default:
                    if( array_key_exists($key,$this->map) ){
                        $_REQUEST[$this->map[$key]] = $part;
                    }
                    break;
            }

        }

    }

    public function cleanKVP(){

        $_REQUEST[AFROUTE] = ( array_key_exists($_REQUEST[AFROUTE],$this->map) ) ? $this->map[$_REQUEST[AFROUTE]] : $_REQUEST[AFROUTE];
        $_REQUEST[AFCONTROL] = ( array_key_exists($_REQUEST[AFCONTROL],$this->map) ) ? $this->map[$_REQUEST[AFCONTROL]] : $_REQUEST[AFCONTROL];

    }

}
?>
