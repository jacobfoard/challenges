<!-- 
	Using everything you have learned and some googling

    Let's play paper rock scissors

    Simulate 2 people playing the best of 7 (gotta win 4)
        - show the results of each "game"

        i.e.

        Game 1:
        Mark - Paper
        Eric - Rock
        Mark Wins [Mark = 1, Eric = 0]

        Game 2:
        Mark - Rock
        Eric - Scissors
        Mark Wins [Mark = 2, Eric = 0]

        etc .....

 -->

<!DOCTYPE html>
<html>
<head></head>
<body>
<p>

    <?php


    // code goes here ...
        $game = 1;
        $markScore = 0;
        $ericScore = 0;
        $ericStr;
        $winner;
        $markStr;
        $winCondition = false;
        
        
        while($winCondition == false){
            
            $mark = rand(0,2);
            $eric = rand(0,2);
            
            
            switch($mark){
                case 0:
                    $markStr = "Rock";
                    break;
                case 1:
                    $markStr = "Paper";
                    break;
                case 2:
                    $markStr = "Scissors";
                    break;
                default:
                    
            }
            switch($eric){
                case 0:
                    $ericStr = "Rock";
                    break;
                case 1:
                    $ericStr = "Paper";
                    break;
                case 2:
                    $ericStr = "Scissors";
                    break;
                default:
                    
            } 
            
            if($markStr == "Rock" && $ericStr == "Paper"){
                $ericScore++;
                $tie = false;
                $winner = "Eric";
            }
            elseif($markStr == "Rock" && $ericStr == "Scissors") {
                $markScore++;
                $tie = false;
                $winner = "Mark";
            }
            elseif($markStr == "Rock" && $ericStr == "Rock") {
                $tie = true;
            }
            elseif($markStr == "Paper" && $ericStr == "Paper") {
                $tie = true;
            }
            elseif($markStr == "Paper" && $ericStr == "Scissors") {
                $ericScore++;
                $tie = false;
                $winner = "Eric";
            }
            elseif($markStr == "Paper" && $ericStr == "Rock") {
                $markScore++;
                $tie = false;
                $winner = "Mark";
            }
            elseif($markStr == "Scissors" && $ericStr == "Paper"){
                $markScore++;
                $tie = false;
                $winner = "Mark";
            }
            elseif($markStr == "Scissors" && $ericStr == "Scissors"){
                $tie = true;
            }
            elseif($markStr == "Scissors" && $ericStr == "Rock" ){
                $ericScore++;
                $tie = false;
                $winner = "Eric";
            }
           
           if($markStr == $ericStr){
                echo "Game: $game </br>";
                echo "Mark - " . $markStr . "</br>";
                echo "Eric - " . $ericStr . "</br>";
                echo "Tie! [Mark = $markScore , Eric = $ericScore ] </br>";
                echo "</br>";
                $game = $game + 1;
            } else{
                echo "Game: $game </br>";
                echo "Mark - " . $markStr . "</br>";
                echo "Eric - " . $ericStr . "</br>";
                echo "$winner wins! [Mark = $markScore , Eric = $ericScore ] </br>";
                echo "</br>";
                $game = $game + 1;
            }
            
            
            if($ericScore == 4){
                $winCondition = true;
            }
            elseif($markScore == 4) {
                $winCondition = true;
            }
        }



    ?>
</p>
</body>
</html>