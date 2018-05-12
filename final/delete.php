<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
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

  function getAppId($id){
    
    $conn = dbConnect();
    $sql = "SELECT * FROM appointment WHERE id='$id'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
 
  
  
  if (isset($_GET['Yes'])) {
    $userid=$_GET['userId'];
    
    $sql = "DELETE FROM appointment  WHERE  id =$userid";
   
    $conn = dbConnect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: scheduler.php");
  }
  
  
  
  if (isset($_GET['No'])) {
    header("Location: scheduler.php");
  }
  
  
  
  if (isset($_GET['id'])) {
    $appinfo = getAppId($_GET['id']);
    
  }
?>

<!DOCTYPE html>
<html>
  <head>
    
    
  </head>
  <body>
    <div id="delete">
        
        
        <p>Are you sure you want to remove the time slot ? This cannot be undone</p>
        <form method="GET">
            <input type="hidden" name="userId" value="<?=$appinfo['id']?>" />
            <input type="submit" id="decision" value="Cancel" name="No" />
            <input type="submit" id="decision" value="Yes remove it !" name="Yes" />
        </form>
    </div>
    
  </body>
</html>