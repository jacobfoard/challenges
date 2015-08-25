<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <p>

        <?php
            /*
             * Bring in your createDeck and dealCards function
               For the specified number of players below, assign each one an even set of cards.
               We will do this by counting out how many players there are, counting how many cards
               are in the deck. then dividing them so we know how many cards each player should get
             */
             
             //Function to shuffle the asssocative array
             function shuffle_assoc(&$array) {
                $keys = array_keys($array);
        
                shuffle($keys);
        
                foreach($keys as $key) {
                    $new[$key] = $array[$key];
                }

                $array = $new;

                return true;
                }
                
            //Function that creates a deck of 52 cards then shuffles the deck to a random order    
            function createDeck() {
                $suits = array ("clubs", "diamonds", "hearts", "spades");
                $faces = array (
                    "Ace" => 1, "2" => 2,"3" => 3, "4" => 4, "5" => 5, "6" => 6, "7" => 7,
                    "8" => 8, "9" => 9, "10" => 10, "Jack" => 11, "Queen" => 12, "King" => 13
                );
    
                $deck = array();
    
                foreach($faces as $key=>$face){
                    foreach($suits as $suit){
                        $newKey = "$key of $suit";
                        $deck[$newKey] = $face;       
                    }
                }
                
                shuffle_assoc($deck);

                return $deck;
              }
              
             //Function that deals a set of X cards and then removes them from the deck of possible cards
             function dealCards(&$deck, $number_of_cards = 0) {
                $randKey = array_rand($deck, $number_of_cards);
                $cards = array();
                for($i = 0; $i < count($randKey); $i++){
                    array_push($cards, $randKey[$i]);
                    unset($deck[$randKey[$i]]);
                    }
                    
                return $cards;
                }
                
                
                $validDeck = createDeck();
                $deck = createDeck();
                $num_players = 4;
                $num_cards_in_deck = count($deck);
                $num_cards_to_give_each_player = $num_cards_in_deck / $num_players;
               // var_dump($deck);
                /*
                  use a for loop to add the "dealt hands" to the $players array
                */
                $players = array(); 
                for($i = 1; $i <= $num_players; $i++) {
                    $players[$i] = dealCards($deck, $num_cards_to_give_each_player);    
                }
             //  var_dump($players);
               /*
               lets create a simple game
               each player will play a card and whoever has the highest value wins. if there are 2 cards played
               that have the same value everybody loses and that round is now a draw.

               store the results of each game in round_winners and also who won that round as the value.
               if the round is a draw store the value as DRAW

                use a loop to play each game until all oponents are out of cards

                Print out the array of all the rounds. if there was a draw the round should say DRAW
                if a player has one it should display "Player X" where X is the index of the player
                
               */
                $turns = array();
                $player1Card = 0;
                $player2Card = 0;
                $player3Card = 0;
                $player4Card = 0;
                $player1Value = 0;
                $player2Value = 0;
                $player3Value = 0;
                $player4Value = 0;
                $round_winners = array();

                for($j = 0; $j < $num_cards_to_give_each_player; $j++){
                   for($i=1; $i <= count($players); $i++){
                      //var_dump($players[$i]);
                        $turns[$i]['deck'][$j] = $players[$i][$j];
                        $player1Card = $turns[1]['deck'][$j];
                        $player2Card = $turns[2]['deck'][$j];
                        $player3Card = $turns[3]['deck'][$j];
                        $player4Card = $turns[4]['deck'][$j];
                    }
                    $player1Value = $validDeck[$player1Card];
                    $player2Value = $validDeck[$player2Card];
                    $player3Value = $validDeck[$player3Card];
                    $player4Value = $validDeck[$player4Card];
                    
                    // var_dump($player1Value);
                    // var_dump($player2Value);
                    // var_dump($player3Value);
                    // var_dump($player4Value);
                    
                    if(max($player1Value,$player2Value,$player3Value,$player4Value) == $player1Value){
                        $round_winners[$j] = "Player 1 Wins!";
                    }
                    
                    if(max($player1Value,$player2Value,$player3Value,$player4Value) == $player2Value){
                        $round_winners[$j] = "Player 2 Wins!";
                    }
                    
                    if(max($player1Value,$player2Value,$player3Value,$player4Value) == $player3Value){
                        $round_winners[$j] = "Player 3 Wins!";
                    }
                    
                    if(max($player1Value,$player2Value,$player3Value,$player4Value) == $player4Value){
                        $round_winners[$j] = "Player 4 Wins!";
                    }
                    
                    if(($player4Value == $player3Value) or ($player4Value == $player2Value) or ($player4Value == $player1Value) or 
                    ($player3Value == $player2Value) or ($player2Value == $player1Value) or ($player3Value == $player1Value)){ 
                        $round_winners[$j] = "DRAW";
                    }
                    

                }

                var_dump ($round_winners);
        ?>

    </p>

    </body>
</html>
