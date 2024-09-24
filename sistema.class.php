<?php
include ('config.class.php');
    class Sistema{
        var $con;
        function conexion(){
            // echo DBUSER;
            // die;
            $this -> con = new PDO(SGBD.':host='.DBHOST.';dbname='.DBNAME.';port='.DBPORT, DBUSER, DBPASS);
        }
    }
?>