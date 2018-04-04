



<!DOCTYPE html>
<html>
    <head>
        <title>Form</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Saira+Condensed" rel="stylesheet">
        <?php $color=$_POST['favcolor']  ?>
    </head>
    <body>
        <div id="result">
            <p>Thanks you for submiting this form,  <?php echo $_POST['name']; ?>  </p>
            <?php 
            
            
            echo 'You are a '. $_POST['gender']. '<br>';
            echo 'We can can contact you at this email adress: ' .$_POST['email']. '<br>';
            echo ' Your hobby is : ' . $_POST['interest']. '<br>';
            echo 'This is what you said about you: ' .$_POST['content']. '<br>';
          
    
            
            
            
            
            ?>
        </div>
        
    </body>
</html>