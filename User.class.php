<?php 
/* 
 * User Class 
 * This class is used for database related (connect, insert, and update) operations 
 * @author    CodexWorld.com 
 * @url        http://www.codexworld.com 
 * @license    http://www.codexworld.com/license 
 */ 

ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', true );
 
class User { 
    
    private $userTbl = 'users'; 
    function __construct(){ 

        require './mysql-connect.php';

        global $conn;
        if(!isset($this->db)){ 
            // Connect to the database 
            // printf("Failed to connect with MySQL, CONENCTINGG"); 

            // $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName); \
            if($conn->connect_error){ 
                printf("Failed to connect with MySQL: " . $conn->connect_error); 
            }else{ 
                $this->db = $conn; 
            } 
        } else {
        }
    } 
     
    function checkUser($data = array()){ 
        require './mysql-connect.php';

        global $conn;
        $this->db = $conn; 
        if(!isset($conn)){ 
            // printf("\nDISCONNECTED"); 
        }
        if(!empty($data)){ 
            // Check whether the user already exists in the database 
            $checkQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$data['oauth_provider']."' AND oauth_uid = '".$data['oauth_uid']."'"; 
            $checkResult = $this->db->query($checkQuery); 
             
            // Add modified time to the data array 
            if(!array_key_exists('modified',$data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            if($checkResult->num_rows > 0){ 
                // Prepare column and value format 
                $colvalSet = ''; 
                $i = 0; 
                foreach($data as $key=>$val){ 
                    $pre = ($i > 0)?', ':''; 
                    $colvalSet .= $pre.$key."='".$this->db->real_escape_string($val)."'"; 
                    $i++; 
                } 
                $whereSql = " WHERE oauth_provider = '".$data['oauth_provider']."' AND oauth_uid = '".$data['oauth_uid']."'"; 
                 
                // Update user data in the database 
                $query = "UPDATE ".$this->userTbl." SET ".$colvalSet.$whereSql; 
                $update = $this->db->query($query); 
            }else{ 
                // Add created time to the data array 
                if(!array_key_exists('created',$data)){ 
                    $data['created'] = date("Y-m-d H:i:s"); 
                } 
                 
                // Prepare column and value format 
                $columns = $values = ''; 
                $i = 0; 
                foreach($data as $key=>$val){ 
                    $pre = ($i > 0)?', ':''; 
                    $columns .= $pre.$key; 
                    $values  .= $pre."'".$this->db->real_escape_string($val)."'"; 
                    $i++; 
                } 
                 
                // Insert user data in the database 
                $query = "INSERT INTO ".$this->userTbl." (".$columns.") VALUES (".$values.")"; 
                $insert = $this->db->query($query); 

                $userPrimaryKeyQuery = "SELECT id FROM users WHERE oauth_provider = '".$data['oauth_provider']."' AND oauth_uid = '".$data['oauth_uid']."'"; 
                $userPrimaryKeyResult = $conn->query($userPrimaryKeyQuery); 
                $userPrimaryKey = $userPrimaryKeyResult->fetch_assoc();
                $updateRoleQuery = "INSERT INTO assoc_user_role (user_fk, role_fk) VALUES (".intval($userPrimaryKey['id']).", -1)";
                $this->db->query($updateRoleQuery);
            } 
             
            // Get user data from the database 
            $result = $this->db->query($checkQuery); 
            $userData = $result->fetch_assoc(); 
            $userPrimaryKeyQuery = "SELECT id FROM users WHERE oauth_provider = '".$data['oauth_provider']."' AND oauth_uid = '".$data['oauth_uid']."'"; 
            $userPrimaryKeyResult = $conn->query($userPrimaryKeyQuery); 
            $userPrimaryKey = $userPrimaryKeyResult->fetch_assoc();
            $getRoleQuery = "SELECT role_fk FROM assoc_user_role WHERE user_fk = '".intval($userPrimaryKey['id'])."'";
            
            $getRoleResult = $this->db->query($getRoleQuery); 
            $getRole = $getRoleResult->fetch_assoc(); 
            $userData['user_role'] = strval($getRole['role_fk']);

        } 
         
        // Return user data 

        return !empty($userData)?$userData:false; 
    } 
}

?>