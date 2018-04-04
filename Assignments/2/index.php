
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Saira+Condensed" rel="stylesheet">
    </head>

    <body>
        <h1>Assignment 2 : HTML FORM </h1>
        
        <div id="form">
            <div id="input">
                <form method="post" action="page2.php">
                		<label>Name: </label>
                		<input type="text" name="name" required autofocus /> </br>
                		
                		<label>Email: </label>
                		<input type="email" name="email" required /> </br>
                		
                		<label>Birthday's date</label>
                		<input type="date" name="date" required/> </br>
                		
                		<label>Gender: </label><br>
                		<input type="radio" name="gender" value="male" checked> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                        <input type="radio" name="gender" value="other"> Other<br>
                		
                		<label>Select your favorite color: </label>
                        <input type="color" name="favcolor" value="#ff0000" required /><br>
                		<label>Hobby: </label>
                		<input type="text" name="interest"  required /> </br>
                
                        <label>Content: </label><br />
                       
                        <textarea name="content" id="content" rows="10" cols="30" required >something about you...</textarea></br> 
            
                	
                	<input type="submit" value="Submit" />
                	<input type="reset" value="Reset"/>
                </form>
            </div>
        </div>
    </body>
</html>