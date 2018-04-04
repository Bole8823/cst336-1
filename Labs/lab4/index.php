

<!DOCTYPE html>
<html>
    <head>
        <title>Lab4: Tech Checkout</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet"> 
    </head>
    <body>
        
        <div id="menu">
        
            <div id="select_type">
                <form action="index.php">
                <select name="type">
                <option value="">Select a type</option>
                <option value="VR headset">VR headset</option>
                <option value="Tablet">Tablet</option>
                <option value="webcam">webcam</option>
                <option value="CheatSheet">CheatSheet</option>
                <option value="Smartphone">Smartphone</option>
                <option value="Camera">Camera</option>
                <option value="Laptop">Laptop</option>
                <option value="Microphone">Microphone</option>
                <option value="Dynamic Mics">Dynamic Mics</option>
                <option value="Tripod">Tripod</option>
                </select><br>
                <input type="radio" name="order" value="item_name" />Order by name</label>
                <input type="radio" name="order" value="price" />Order by price</label>
                <br>
                <input type="submit", value="filter"><br>
                </form> 
            </div>
            
            <div id="select_name">
                <form action="index.php"><br>
                Search by name:<input type="text" name="name" value=""><br>
                <input type="radio" name="order" value="item_name" />Order by name</label>
                <input type="radio" name="order" value="price" />Order by price</label>
                <br>
                <input type="submit", value="Search">
                </form> 
            </div>
            
            <div id="availability">
                <form action="index.php"><br>
                    <input type="radio" name="availability" value="available" /> Available</label>
                    <input type="radio" name="availability" value="checkedout" /> Checked Out</label><br>
                    <input type="radio" name="order" value="item_name" />Order by name</label>
                <input type="radio" name="order" value="price" /> Order by price</label>
                <br><br>
                <input type="submit", value="Select">
                </form> 
            </div>
            
            <div id="reset">
                <form action="index.php"><br>
                    
                <input type="submit", value="Reset">
                </form> 
            </div>
        
        
        </div>
               
        
        
        
        
        
        
        
        
        
            <?php
            /*
            $host = "p2d0untihotgr5f6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $dbname = "jmjet2bi89ylt1b5";
            $username = "gonadbcm28b2pbc2";
            $password = "j8logw12pooo3jyl";

            $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            */
            
            //$connUrl = getenv('JAWSDB_MARIA_URL');
            $connUrl = "mysql://gonadbcm28b2pbc2:j8logw12pooo3jyl@p2d0untihotgr5f6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/jmjet2bi89ylt1b5";
            $hasConnUrl = !empty($connUrl);
            
            $connParts = null;
            if ($hasConnUrl) {
                $connParts = parse_url($connUrl);
            }
            
            //var_dump($hasConnUrl);
            $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
            $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'lab4';
            $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
            $password = $hasConnUrl ? $connParts['pass'] : '';
            
            $bdd= new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            

            
            
            if ($_GET['type']!='')
            {
                $result=$_GET['type'];
               if($_GET['order']=='price'){
                   $order='price';
                    $reponse = $bdd->query('SELECT * FROM device WHERE deviceType=\'' . $_GET['type'] . '\' ORDER BY price');
               } else {
                   $order='name';
                    $reponse = $bdd->query('SELECT * FROM device WHERE deviceType=\'' . $_GET['type'] . '\'');
               }
                
            } 
            else if ($_GET['name']!='')
            {
                $result=$_GET['name'];
                if($_GET['order']=='price'){
                    $order='price';
                    $reponse = $bdd->query('SELECT * FROM device WHERE deviceName like \'%' . $_GET['name'] . '%\' OR deviceType like \'%' . $_GET['name'] . '%\' ORDER BY price');
               } else {
                   $order='name';
                    $reponse = $bdd->query('SELECT * FROM device WHERE deviceName like \'%' . $_GET['name'] . '%\'OR deviceType like \'%' . $_GET['name'] . '%\' ORDER BY deviceName');
               }
            	
            } 
            
            
            else if ($_GET['availability']=='available')
            {
                $result='Available';
                 if($_GET['order']=='price'){
                     $order='price';
                    	$reponse = $bdd->query('SELECT * FROM device WHERE status=\'Available\'ORDER BY price');
               } else {
                   $order='name';
                    	$reponse = $bdd->query('SELECT * FROM device WHERE status=\'Available\'ORDER BY deviceName');
               }
            	
            } 
            else if ($_GET['availability']=='checkedout')
            {
                $result='Checked Out';
                 if($_GET['order']=='price'){
                     $order='price';
                    $reponse = $bdd->query('SELECT * FROM device WHERE status=\'CheckedOut\'ORDER BY price');
               } else {
                   $order='name';
                    $reponse = $bdd->query('SELECT * FROM device WHERE status=\'CheckedOut\' ORDER BY deviceName');
               }
            	
            } 
            else if($_GET['type']=='')
            {
                $result='No filter';
                if($_GET['order']=='price'){
                    $order='price';
                    $reponse = $bdd->query('SELECT * FROM device ORDER BY price');
               } 
               else if($_GET['order']='item_name')
               {
                   $order='name';
                    $reponse = $bdd->query('SELECT * FROM device ORDER BY deviceName');
               }else {
                $reponse = $bdd->query('SELECT * FROM device ');
                }
            	
            }
            ?>
            
            <div id="header">
            <h1>Tech Checkout</h1>
             <p>Filter: <?php echo $result; ?>, order: <?php echo $order; ?></p>
            </div>
            
            <div id="space">
                
            </div>
            
           
            
            
            <?php
            
            while ($donnees = $reponse->fetch())
            {
            ?>
                <div id="item">
            
                    <strong>Device: </strong> <?php echo $donnees['deviceName']; ?><br />
                    <strong>type : </strong><?php echo $donnees['deviceType']; ?> <br />
                    <strong>Price: </strong>$<?php echo $donnees['price']; ?> <br />
                    <?php
                    if($donnees['status']=='CheckedOut' || $donnees['status']=='Checkedout'){
                        echo '<span style="color:red;text-align:center;"><strong>Status: </strong> Checked Out</span>';
                    } else {
                        echo '<span style="color:green;text-align:center;"><strong>Status: </strong> Available</span>';
                    }
                    ?>
                    
                
                </div>
        
        
        
        <?php
        }
        $reponse->closeCursor(); 
    ?>
    </body>
</html>