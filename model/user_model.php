<?php

include '../commons/db_connection.php';
$dbcon =  new DbConnection();
class Roles{

    public function getAllRoles(){
        $conn = $GLOBALS["con"];
        $sql = "SELECT * FROM role";
        $result = $conn -> query($sql) or die($conn->error);
        return $result;
    }

    public function getRoleModule($role_id){
        $conn = $GLOBALS["con"];
        $sql = "SELECT * FROM role_module r, module m WHERE r.module_id = m.module_id AND r.role_id = '$role_id'";
        $result = $conn -> query($sql) or die($conn->error);
        return $result; 
    }
    
    public function getModuleFunctions($module_id){
        $conn = $GLOBALS["con"];
        $sql = "SELECT * FROM function WHERE module_id = '$module_id'";
        $result = $conn -> query($sql) or die($conn->error);
        return $result; 
    }
    public function addUser($fname,$lname,$dob,$nic,$user_role,$user_image,$email){
        $conn = $GLOBALS["con"];
        $sql = "INSERT INTO user (user_fname, user_lname, user_dob, user_nic, user_role, user_image, user_email) VALUES ('$fname', '$lname', '$dob', '$nic', '$user_role', '$user_image', '$email')";
        $conn -> query($sql) or die($conn->error);
        $user_id = $conn->insert_id;
        return $user_id;
    }

}