<?php

include '../commons/db_connection.php';
$dbcon =  new DbConnection();
class Roles{

    function getAllRoles(){
        $conn = $GLOBALS["con"];
        $sql = "SELECT * FROM role";
        $result = $conn -> query($sql) or die($conn->error);
        return $result;
    }

}