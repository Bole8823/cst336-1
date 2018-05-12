
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
            $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'final';
            $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
            $password = $hasConnUrl ? $connParts['pass'] : '';
            
            return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            
            
}
$conn = dbConnect();

            if (isset($_POST['add'])) { 
    
                $date = $_POST['date'];
                $starttime = $_POST['starttime'];
                $endtime = $_POST['endtime'];
                $date1   = strtotime($starttime);
                $date2 = strtotime($endtime);
                $duration=dateDiff($date1, $date2);
                 
                
                
                $sql = "INSERT INTO appointment
                            (date, start_time, duration, booked)
                        VALUES
                            ('$date', '$starttime', '$duration', '1')";
                
                
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                header("Location: scheduler.php");
                
                
            }
        ?>


<style>
    #logout {
        text-align: right;
    }
    
    
    #Add {
        display:none ;
        border: 1px solid black;
        width: 250px;
        margin-left:auto;
        margin-right: auto;
    }
    
    
</style>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <div id="logout">
            <form action="logout.php">
                
                <input type="submit" id="mainPageButtons" value="Logout" />
                
            </form>
        </div>
            
        <div id="invLink">
            <p>Invitation link</p>
        </div>
        
        
        <p onclick="myFunction()">Add multiple time slots</p>
        
        
        <div id="Add">
            <p>Add Time Slot</p>
            <form  method="POST">
                Date: <input id="date" type="date" name="date"><br>
                Start Time<input name="starttime" type="time"> <br>
                End time<input name="endtime" type="time"><br>
                <input type="submit" id="addbutton" value="Add" name="add" />
            </form>
        </div>
        
        
        
        
        
        <?php
            $bdd= new PDO("mysql:host=localhost;dbname=final", 'etiennedivet', '');
            $sql='SELECT * FROM appointment WHERE date > CURDATE() ORDER BY date ';	
        ?>
           
            <table id="data">
            <tr>
                <th>date</th>
                <th>Start time</th>
                <th>Duration</th>
                <th>Booked by</th>
                
            </tr>
            <?php 
                showData($sql);
            ?>
        </table>
        
        
             
    </body>
</html>

<?php
    function showData($a) {
        $bdd= dbConnect();
        $sql=$a;
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['start_time']."</td>";
            echo "<td>".$row['duration']."</td>";
            if ($row['booked'] == 0 ){
                echo "<td>". "Not Booked". "</td>";
            } else if ($row['booked'] == 1 ){
                echo "<td>". "Some Person". "</td>";
            }
            echo "<td>"."Details"."</td>";
            echo "<td><a  href='delete.php?id=".$row['id']."'>Cancel</a></td>";
             
            
            
            
            echo "</tr>";
        }
    }
    
    
    function dateDiff($date1, $date2){
                    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
                    $retour = array();
                 
                    $tmp = $diff;
                    $retour['second'] = $tmp % 60;
                 
                    $tmp = floor( ($tmp - $retour['second']) /60 );
                    $retour['minute'] = $tmp % 60;
                 
                    $tmp = floor( ($tmp - $retour['minute'])/60 );
                    $retour['hour'] = $tmp % 24;
                 
                    $tmp = floor( ($tmp - $retour['hour'])  /24 );
                    $retour['day'] = $tmp;
                 
                    return $retour;
                }
?>



<script>
    
function myFunction() {
    if( document.getElementById("Add").style.display=="block"){
         document.getElementById("Add").style.display= "none" ;
    } else {
    document.getElementById("Add").style.display= "block" ;
    }
}
</script>

