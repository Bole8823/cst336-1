<?php
session_start() 
?>
<?php


$_SESSION['number1']=$_REQUEST['number_entered1'];
$_SESSION['number2']=$_REQUEST['number_entered2'];

$submitbutton= $_POST['submit'];


$_SESSION['randomnumber1']= mt_rand(1,10);
$_SESSION['randomnumber2']= mt_rand(1,10);
?>





<!DOCTYPE html>
<html>
    <head>
        <title>Guess the numbers </title>
    </head>
    <body>
        <h1>Guess the numbers </h1>
		<h2> guess two numbers between 1 and 10 !</h2>
		<form method="POST" action="index.php">
            <div>
                <label>Number 1: </label>
                <input type="text" name="number_entered1"/>
            </div>
            <div>
                <label>Number 2: </label>
                <input type="text" name="number_entered2"/>
            </div>
            <div>
                <input type="submit" name="submit" value="submit"/>
	            </br>
        </form>
        
        
        <?php 
if ($submitbutton){
   
if (($_SESSION['number1'] > 0) && ($_SESSION['number1'] <11)){
        if ($_SESSION['number1'] < $_SESSION['randomnumber1'])
        {
            echo "the first number should be higher<br>";
        }
        else if ($_SESSION['number1'] > $_SESSION['randomnumber1'])
        {
           echo "the first number should be lower<br>";
        }
        else 
        {
            echo "You've guessed the first number!<br>";
        }
    }

}

if ($submitbutton){
   
if (($_SESSION['number2'] > 0) && ($_SESSION['number2'] <11)){
        if ($_SESSION['number1'] < $_SESSION['randomnumber2'])
        {
            echo "the first number should be higher</ br>";
        }
        else if ($_SESSION['number2'] > $_SESSION['randomnumber2'])
        {
           echo "the first number should be lower</ br>";
        } 
        else 
        {
            echo "You've guessed the first number!</ br> ";
        }
    }

}

echo $_SESSION['randomnumber1'];
echo $_SESSION['randomnumber2'];
?>
    </body>
</html>