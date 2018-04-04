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
$conn = dbConnect();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}






    
if (isset($_POST['addUser'])) { 
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    
    $sql = "INSERT INTO user
                (firstName, lastName, email, phone)
            VALUES
                ('$firstName', '$lastName', '$email', '$phone')";
    
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
    
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Add new user</title>
        
    </head>
    <body>
        
        <h1> Adding New User </h1>
        
        <h1> Tech Checkout System: Adding a New User</h1>
        <form method="POST">
            
            
            First Name:<input type="text" name="firstName" />
            <br />
            Last Name:<input type="text" name="lastName"/>
            <br/>
            Email: <input type= "email" name ="email"/>
            <br/>
            Phone Number: <input type ="text" name= "phone"/>
            <br />
            <input type="submit" id="addUserButton" value="Add User" name="addUser">
        </form>
    </body>
</html>