<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <p>

        <?php
            /* 
              Using your advanced knowledge of cards and arrays, Create a game of Blackjack
              Rules:
             	at any given time there will only be 2 players. the dealer and player one.
             	4 cards will be dealt out each round, 2 to the dealer and 2 to the player
             	if the amount in the players hand is less than or equal to the amount in the dealer hand
             		you must get a hit (draw a card)
             	if a player hits and the amount he has goes over 21, he has BUSTED and the dealer won that round
             	if the player ever reaches an amount greater than the dealers he should stay; then it will be 
             	    the dealers turn.
             	The dealer must draw until he reaches an amount greater than the player or until he has BUST
             	Subtract $100 from the players bank every time they lose
             	Add $200 to the players bank every time they win
             	Player starts with $1000 in the bank account
             	Aces can either be an 11 or 1
             	
             	the game will continue as long as there are enough cards in the deck OR the player runs out of money

             	Output:
		         	How many games were played?
		         	Who won the game?
		         	Which round did the player's bank reach half way?
		         	How many times did the player get blackjack ?

             	Extra Credit && Prize =]

             		Create a function called countCards and enable it for the player NOT the dealer
             		This function must analyze the deck and determine if the player should draw again
             		even if the amount in his hand is greater than the dealer.
             		This would be very useful lets say if the dealer has a sum of 9 on the table
             		You might have two 6's (amount of 12). Should you hit again? 
             		More than likely, because chance is the dealer can beat your 12

             	Winner will be determined by whoever has successfully implemented this AND has the best logic
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
                    "8" => 8, "9" => 9, "10" => 10, "Jack" => 10, "Queen" => 10, "King" => 10
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
            $num_players = 2;
            $num_cards_in_deck = count($deck);
            $num_cards_to_give_each_player = 2;
            

            $winCondtion = false;
            $playerBank = 300;
            

            $num_players = 2;    

            while($playerBank > 0){
                
                //while($winCondtion == false){
                    $validDeck = createDeck();
                    $deck = createDeck();
    
                    $players = array(); 
                    for($i = 1; $i <= $num_players; $i++) {
                        $players[$i] = dealCards($deck, 2);
                    }
                 
                    $dealerCard1 = $players[1][0];
                    $dealerCard2 = $players[1][1];
                    $dealerCard4 = $players[1][3][0];
                    $dealerValue1 = $validDeck[$dealerCard1];
                    $dealerValue2 = $validDeck[$dealerCard2];
                    $dealerValueTotal = $dealerValue1 + $dealerValue2;
            
                    $playerCard1 = $players[2][0];
                    $playerCard2 = $players[2][1];
                    $playerValue1 = $validDeck[$playerCard1];
                    $playerValue2 = $validDeck[$playerCard2];
                    
                    $playerValue4 = $validDeck[$playerCard4];
                    $playerValueTotal = $playerValue1 + $playerValue2;
                         
                    if($playerValueTotal < 17){
                        $players[2][2] = dealCards($deck, 2);
                        $playerCard3 = $players[2][2][0];
                        $playerValue3 = $validDeck[$playerCard3];
                        $playerValueTotal = $playerValue1 + $playerValue2 + $playerValue3;
                    }
        
                    if(($dealerValueTotal < $playerValueTotal) && ($dealerValueTotal <= 21)){
                        $players[1][2] = dealCards($deck, 2);
                        $dealerCard3 = $players[1][2][0];
                        $dealerValue3 = $validDeck[$dealerCard3];
                        $dealerValueTotal = $dealerValue1 + $dealerValue2 + $dealerValue3;
                    }
                    else{
                        $winCondtion = true;
                        if($playerValueTotal > $dealerValueTotal){
                            $playerBank = $playerBank + 200;
                        }
                        else{
                            $playerBank = $playerBank - 100;    
                        }
                    }
                    
                    if(($dealerValueTotal < $playerValueTotal) && ($dealerValueTotal <= 21)){
                        $players[1][3] = dealCards($deck, 2);
                        $dealerCard4 = $players[1][3][0];
                        $dealerValue4 = $validDeck[$dealerCard4];
                        $dealerValueTotal = $dealerValue1 + $dealerValue2 + $dealerValue3 + $dealerValue4;
                    }else{
                        $winCondtion = true;
                        if($playerValueTotal > $dealerValueTotal){
                            $playerBank = $playerBank + 200;
                        }else{
                            $playerBank = $playerBank - 100;    
                        }
                    }
                    
                //}
            }
            
            var_dump($players);
            echo $dealerValueTotal;
            var_dump($playerValueTotal);
            //}
        ?>

    </p>

    </body>
</html>
