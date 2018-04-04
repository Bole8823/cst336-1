<?php
session_start();
function dbConnect() {
    $connUrl = "mysql://gonadbcm28b2pbc2:j8logw12pooo3jyl@p2d0untihotgr5f6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/jmjet2bi89ylt1b5";
            $hasConnUrl = !empty($connUrl);
            
            $connParts = null;
            if ($hasConnUrl) {
                $connParts = parse_url($connUrl);
            }
            
            //var_dump($hasConnUrl);
            $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
            $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'lab5';
            $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
            $password = $hasConnUrl ? $connParts['pass'] : '';
            
            return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
 $conn = dbConnect;
 
 if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
 



function getUserInfo($id){
    
    $conn = dbConnect();
    $sql = "SELECT * FROM user WHERE user_id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

if(isset($_GET['id'])) {
    $userInfo = getUserInfo($_GET['id']);
}


 if(isset($_GET['updateUser'])) {
    $firstname=$_GET['firstName'];
    $lastname=$_GET['lastName'];
    $phone=$_GET['phone'];
    $email=$_GET['email'];
    $userid=$_GET['userId'];
     
    
    $sql = "UPDATE  `lab5`.`user` SET  `firstName` =  '$firstname' WHERE  `user`.`user_id` =$userid";
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "UPDATE  `lab5`.`user` SET  `lastName` =  '$lastname' WHERE  `user`.`user_id` =$userid";
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "UPDATE  `lab5`.`user` SET  `email` =  '$email' WHERE  `user`.`user_id` =$userid";
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "UPDATE  `lab5`.`user` SET  `phone` =  '$phone' WHERE  `user`.`user_id` =$userid";
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
            
    
             
    
     header("Location: admin.php");
}





?>



<!DOCTYPE html>
<html>
    <head>
        <title> Update User </title>
        
    </head>
    <body>

        <h1> Update User </h1>
        
        <form method="GET">
            <input type="hidden" name="userId" value="<?=$userInfo['user_id']?>" />
            First Name:<input type="text" name="firstName" value="<?=$userInfo['firstName']?>" />
            <br />
            Last Name:<input type="text" name="lastName" value="<?=$userInfo['lastName']?>"/>
            <br/>
            Email: <input type= "email" name ="email" value="<?=$userInfo['email']?>"/>
            <br/>
            Phone Number: <input type ="text" name= "phone" value="<?=$userInfo['phone']?>"/>
            <br />
           
            <input type="submit" id="updateButton" value="Update User" name="updateUser">
        </form>

    </body>
</html>