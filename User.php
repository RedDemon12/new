<?php
class User {
	private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "inhouse";
    private $userTbl    = 'users';
	
	function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
	
	function checkUser($userData = array()){
    if(!empty($userData)){
        //Check whether user data already exists in database
        $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
        $prevResult = $this->db->query($prevQuery);
        if($prevResult->num_rows > 0){
            //Update user data if already exists
            $query = "UPDATE ".$this->userTbl." SET firstname = '".$userData['first_name']."', surname = '".$userData['last_name']."', email = '".$userData['email']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $update = $this->db->query($query);
        }else{
            //Insert user data
            $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', 
            firstname = '".$userData['first_name']."', surname = '".$userData['last_name']."', email = '".$userData['email']."', 
            locale = '".$userData['locale']."', picture = '".$userData['picture']."', status = 'verified', password = 'googleuser123',
            created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";

            $insert = $this->db->query($query);
        }
        
        //Get user data from the database
        $result = $this->db->query($prevQuery);
        $userData = $result->fetch_assoc();
        
        // Assign email and password to session variables
        $_SESSION['email'] = $userData['email'];
        $_SESSION['password'] = $userData['password'];
    }
    
    //Return user data
    return $userData;
}

}
?>