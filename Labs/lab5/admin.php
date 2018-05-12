<?php
session_start();


if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}


?>
<!DOCTYPE HTML> 
<html>
    <head>
        <title>Admin Main Page </title>
         <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
        
    </head>
    <body>

            <h1> Admin Page </h1>
            <h2> Welcome <?=$_SESSION['username']?>! </h2>
            
            <form action="addUser.php">
                
                <input type="submit" id="mainPageButtons" value="Add new user" />
                
            </form>
            
            <form action="logout.php">
                
                <input type="submit" id="mainPageButtons" value="Logout!" />
                
            </form>
            
            <br />
            
            <table id="users">
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php 
                showUser();
            ?>
        </table>
    </body>
</html>



<?php 
function showUser() {
    $conn = dbConnect();
    $sql = "SELECT * FROM user ORDER BY lastName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        
        echo "<td>".$row['firstName']."</td>";
        echo "<td>".$row['lastName']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td><a href='updateUser.php?id=".$row['user_id']."'>Update</a></td>";
        echo "<td><a onclick='return confirmDelete()' href='deleteUser.php?id=".$row['user_id']."'>Delete</a></td>";
        echo "</tr>";
    }
}

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

?>