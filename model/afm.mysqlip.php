<?php
/*
!!!THIS FILE IS NOT SAFE TO MODIFY!!!

AMP Frame ver 1.0.0
model/afm.mysqlip.php
mySQLi Procedural Data Model
*/
if( !defined('AFALLOW') ){
    die('direct access not allowed');
}

class afmMysqliP{

    public $link;

    protected $db;

    public $dbTable;

    public function __construct( $arg=null ){

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

        if( !empty($arg['connect']) ){
            $this->connect();
        }

    }

    public function connect( $arg=null, $arg1=null, $arg2=null, $arg3=null, $arg4=null, $arg5=null ){

        if( !empty($arg) ){
            if( is_array($arg) ){
                $this->db->host = ( empty($arg['host']) ) ? null : $arg['host'];
                $this->db->user = ( empty($arg['user']) ) ? null : $arg['user'];
                $this->db->pass = ( empty($arg['pass']) ) ? null : $arg['pass'];
                $this->db->name = ( empty($arg['name']) ) ? null : $arg['name'];
                $this->db->port = ( empty($arg['port']) ) ? null : $arg['port'];
                $this->db->socket = ( empty($arg['socket']) ) ? null : $arg['socket'];
            }else{
                $this->db->host = ( empty($arg) ) ? null : $arg;
                $this->db->user = ( empty($arg1) ) ? null : $arg1;
                $this->db->pass = ( empty($arg2) ) ? null : $arg2;
                $this->db->name = ( empty($arg3) ) ? null : $arg3;
                $this->db->port = ( empty($arg4) ) ? null : $arg4;
                $this->db->socket = ( empty($arg5) ) ? null : $arg5;
            }
        }

        $this->link = mysqli_connect( $this->db->host, $this->db->user, $this->db->pass, $this->db->name, $this->db->port, $this->db->socket);

        if( mysqli_connect_errno() ){
            trigger_error('Problem connecting to the database: ('.mysqli_connect_errno().')'.mysqli_connect_error(), E_USER_ERROR);
        }
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

    public function runQuery( $arg=null, $arg1=null ){

        if( is_array($arg) ){
            $queryName = ( empty($arg['queryName']) ) ? 'query' : $arg['queryName'];
            $resName = ( empty($arg['resName']) ) ? 'result' : $arg['resName'];
        }else{
            $queryName = ( empty($arg) ) ? 'query' : $arg;
            $resName = ( empty($arg1) ) ? 'result' : $arg1;
        }

        $this->{$resName} = mysqli_query($this->link,$this->{$queryName});

        if( mysqli_error($this->link) ){
            trigger_error(mysqli_error($this->link), E_USER_ERROR);
        }

    }

    public function doQuery( $arg, $arg1=null ){

        if( is_array($arg) ){
            if( empty( $arg['query'] ) ){
                trigger_error('Missing query in doQuery', E_USER_ERROR);
            }
            $resName = ( empty($arg['resName']) ) ? 'result' : $arg['resName'];
            $this->{$resName} = mysqli_query($this->link, $arg['query']);
        }else{
            $resName = ( empty($arg1) ) ? 'result' : $arg1;
            $this->{$resName} = mysqli_query($this->link, $arg);
        }

        if( mysqli_error($this->link) ){
            trigger_error(mysqli_error($this->link), E_USER_ERROR);
        }

    }

    public function getRows( $arg=null ){

        if( is_array($arg) ){
            $resName = ( empty($arg['resName']) ) ? 'result' : $arg['resName'];
        }else{
            $resName = ( empty($arg) ) ? 'result' : $arg;
        }

        return mysqli_num_rows($this->{$resName});

    }

    public function fetchRow( $arg=null ){

        if( is_array($arg) ){
            $resName = ( empty($arg['resName']) ) ? 'result' : $arg['resName'];
        }else{
            $resName = ( empty($arg) ) ? 'result' : $arg;
        }

        return mysqli_fetch_object($this->{$resName});

    }

    public function insertId( $arg=null ){

        return mysqli_insert_id( $this->link );

    }

    public function prepare( $arg, $arg1 ){

        if( is_array($arg) ){
            if( empty($arg['stmt']) ){
                trigger_error('Missing stmt in prepare', E_USER_ERROR);
            }
            $stmtName = ( empty($arg['stmtName']) ) ? 'statement' : $arg['stmtName'];
            $this->{$stmtName} = mysqli_prepare($this->link, $arg['stmt']);
        }else{
            $stmtName = ( empty($arg1) ) ? 'statement' : $arg1;
            $this->{$stmtName} = mysqli_prepare($this->link, $arg);
        }

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
            return mysqli_real_escape_string($this->link, $value);
        }else{
            return $value;
        }

    }

    public function returnTable( $arg ){

        if( is_array($arg) ){
            if( !isset($arg['name']) ){
                trigger_error('Missing name in returnTable', E_USER_ERROR);
            }
            $name = $arg['name'];
        }else{
            $name = $arg;
        }

        if( empty($this->dbTable->{$name}) ){
            return $name;
        }else{
            return $this->dbTable->prefix.$this->dbTable->{$name};
        }

    }

}
?>
