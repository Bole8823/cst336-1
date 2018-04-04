 <?php
function displayHand($pos, $suitesRandom, $numberRandom)//displays the cards chosen at random
{
switch ($suitesRandom)
            {
                case 0: $symbol ='clubs';
                    break;
                case 1: $symbol ='diamonds';
                    break;
                case 2: $symbol ='hearts';
                    break;
                case 3: $symbol = 'spades';
                    break;
            }
            echo "<img id='card$pos' src='img/$symbol/$numberRandom.png' width='75'/>";
}
 
function findWinner($play1, $play2, $play3, $play4) //compares scores and prints out winner's points
{
    $p1win = $play2+$play3+$play4;
    $p2win = $play1+$play3+$play4;  
    $p3win = $play2+$play1+$play4;
    $p4win = $play2+$play3+$play1;
    for ($s=42; $s > 30; $s--)
    {
        if ($play1 == $s)
        {
            echo "<h1>Berlin wins $p1win points</h1>";
            break;
        }
        elseif ($play2 == $s)
        {
            echo "<h1>Tokyo wins $p2win points</h1>";
            break;
        }
        elseif ($play3 == $s)
        {
            echo "<h1>El profesor wins $p3win points</h1>";
            break;
        }
        elseif ($play4 == $s)
        {
            echo "<h1>the secret player wins $p4win points</h1>";
            break;
        }     
     }   
}
function getHand()
{
    $taken = array(0,0,0,0); //keeps track of which players have already gone
    $avail = array();       //keeps track of available cards
    for ($n = 0; $n < 4; $n++)
    {
        $j = rand(1,4);          
        while($taken[$j-1] == 10) 
        {
            $j = rand(1,4);
        }
        $taken[$j-1] = 10;          
        echo "<img id='player$j' src='img/players/player$j.png' width='75'/>";    //prints player images
        ${"score" . $j} = 0;
        $cont = true;
        while(${"score" . $j} <= 42 && $cont == true)   //selects the random numbers and passes them to displayHand
        {
            $suitesRandom = rand(0,3);
            $numberRandom = rand(1,13);
            if ($avail[$numberRandom][$suitesRandom] == 100)    //prevents same card from being drawn
            {
                $suitesRandom = rand(0,3);
                $numberRandom = rand(1,13);
            }
            else                                                    
            {
                $avail[$numberRandom][$suitesRandom] = 100;
                $suites = $suitesRandom;
                $number = $numberRandom;
            }
                                                              
            $handArray = array($suites, $number);
            displayHand($i, $suitesRandom, $numberRandom);
            ${"score" . $j} = ${"score" . $j} + $numberRandom;
    
            if (${"score" . $j} > 30 && ${"score" . $j} <=42)   //stops the draw process
            {
                $cont = false;
            }
        }
        echo ${"score" . $j}; //prints indivdual scores
        echo "<br>";
    }
findWinner($score1,$score2,$score3,$score4);
   
}
?>
