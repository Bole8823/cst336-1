<!DOCTYPE html>
<html>
    <head>
        <title>Midterm program2</title>
    </head>
    <body>
        <?php
            $bdd= new PDO("mysql:host=localhost; dbname=midterm", 'etiennedivet', '');
        ?>
        
        <div id="header">
            <h1>Midterm program 2</h1>
        </div>
            
         <?php
            $reponse = $bdd->query('SELECT * FROM m_students WHERE gender="F" ORDER BY lastName ASC');
            
            echo "<br><b>List of all female students</b><br><br>" ;
            echo " FirstName    LastName<br>";
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['firstName'] . "   " ;
                echo $donnees['lastName'] . "</br>"; 
            }
            
            $reponse = $bdd->query('SELECT firstName, lastName, grade FROM m_students NATURAL JOIN m_gradebook WHERE grade <50 ORDER BY grade ASC');
            
             echo "<br><b>List of students that have assignments with a grade lower than 50 </b><br>" ;
             echo " FirstName    LastName    Grade <br>";
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['firstName'] . "   " ;
                echo $donnees['lastName'] . "   " ;
                echo $donnees['grade'] . "</br>"; 
            }
            
            $reponse = $bdd->query('SELECT title, dueDate, assignmentId FROM m_assignments WHERE NOT EXISTS (SELECT assignmentId FROM m_gradebook WHERE m_assignments.assignmentId = m_gradebook.assignmentId)');
            
            echo "<br><b>List of assignments that have not been graded</b><br>" ;
            echo " Title                  dueDate<br>";
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['title'] . "  ";
                echo $donnees['dueDate'] . "</br>";
            }
            
            $reponse = $bdd->query('SELECT firstName,lastName,title,grade FROM m_students NATURAL JOIN m_gradebook NATURAL JOIN m_assignments ORDER BY lastName');
            
            echo "<br><b>Gradebook</b><br>" ;
            echo " FirstName    LastName    Title     Grade<br>";
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['firstName'] . "   ";
                echo $donnees['lastName'] . "   ";
                echo $donnees['title'] . "   ";
                echo $donnees['grade'] . "</br>";
            }
     
            
            $reponse = $bdd->query('SELECT studentId, firstName, lastName, sum(grade) FROM m_students NATURAL JOIN m_gradebook GROUP BY studentId ORDER BY sum(grade) DESC');
            
            echo "<br><b>List of average grade per student (average of the three assignments)</b><br>" ;
            echo "StudentId   FirstName    LastName     average<br>";
            while ($donnees = $reponse->fetch())
            {
                echo $donnees['studentId'] . "   ";
                echo $donnees['firstName'] . "   ";
                echo $donnees['lastName'] . "   ";
                $avg=$donnees['sum(grade)']/3;
                echo $avg . "</br>";
            }
         
            
            
            $reponse->closeCursor(); 
            ?>
    </body>
</html>