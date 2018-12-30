<?php
/*
!!!THIS FILE IS NOT SAFE TO MODIFY!!!

AMP Frame ver 1.0.0
model/afm.mysqlio.php
mySQLi Object Data Model
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

class afmMysqliO extends mysqli{

    protected $db;

    public $dbTable;

    public function __construct( $arg ){

        $this->db = new stdClass();
        $this->db->host = ( empty($arg['host']) ) ? null : $arg['host'];
        $this->db->user = ( empty($arg['user']) ) ? null : $arg['user'];
        $this->db->pass = ( empty($arg['pass']) ) ? null : $arg['pass'];
        $this->db->name = ( empty($arg['name']) ) ? null : $arg['name'];
        $this->db->port = ( empty($arg['port']) ) ? null : $arg['port'];
        $this->db->socket = ( empty($arg['socket']) ) ? null : $arg['socket'];

        $this->dbTable = new stdClass();
        if( !empty($arg['dbTable']) ){
            foreach( $arg['dbTable'] as $key=>$value ){
                $this->dbTable->{$key} = $value;
            }
        }

        parent::__construct( $this->db->host, $this->db->user, $this->db->pass , $this->db->name , $this->db->port, $this->db->socket );

    }

    public function setQuery( $arg, $arg1=null ){

        if( is_array($arg) ){
            if( empty( $arg['query'] ) ){
                trigger_error('Missing query in setQuery', E_USER_ERROR);
            }
            $name = ( empty($arg['queryName']) ) ? 'query' : $arg['queryName'];
            $this->{$name} = $arg['query'];
        }else{
            $name = ( empty($arg1) ) ? 'query' : $arg1;
            $this->{$name} = $arg;
        }

    }

    public function runQuery( $arg=null, $arg=null ){

        if( is_array($arg) ){
            $queryName = ( empty($arg['queryName']) ) ? 'query' : $arg['queryName'];
            $resName = ( empty($arg['resName']) ) ? 'result' : $arg['resName'];
        }else{
            $queryName = ( empty($arg) ) ? 'query' : $arg;
            $resName = ( empty($arg1) ) ? 'result' : $arg1;
        }

        $this->{$resName} = $this->query($this->{$queryName});

        if( $this->error ){
            trigger_error($this->error, E_USER_ERROR);
        }


    }

    public function doQuery( $arg, $arg1=null ){

        if( is_array($arg) ){
            if( empty( $arg['query'] ) ){
                trigger_error('Missing query in doQuery', E_USER_ERROR);
            }
            $resName = ( empty($arg['resName']) ) ? 'result' : $arg['resName'];
            $this->{$resName} = $this->query($arg['query']);
        }else{
            $resName = ( empty($arg1) ) ? 'result' : $arg1;
            $this->{$resName} = $this->query($arg1);
        }

        if( $this->error ){
            trigger_error($this->error, E_USER_ERROR);
        }

    }

    public function getRows( $arg=null ){

        if( is_array($arg) ){
            $resName = ( empty($arg['resName']) ) ? 'result' : $arg['resName'];
        }else{
            $resName = ( empty($arg) ) ? 'result' : $arg;
        }

        return $this->{$resName}->rows;

    }

    public function fetchRow( $arg=null ){

        if( is_array($arg) ){
            $resName = ( empty($arg['resName']) ) ? 'result' : $arg['resName'];
        }else{
            $resName = ( empty($arg) ) ? 'result' : $arg;
        }

        return $this->{$resName}->fetch_object();

    }

    public function makeSafe( $arg ){

        if( is_array($arg) ){
            if( !isset($arg['value']) ){
                trigger_error('Missing value in makeSafe', E_USER_ERROR);
            }
            $value = $arg['value'];
        }else{
            $value = $arg;
        }

        if( is_string($value) ){
            return $this->real_escape_string($value);
        }else{
            return $value;
        }

    }

}
?>
