<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <p>

        <?php

        /**
         * Copy exercise 5 into this file.
         *
         * Use a custom sort function and closure to sort the names
         * by their scores, with the highest scores first before
         * printing the names out on the screen.
         *
         * @see http://php.net/manual/en/function.usort.php
         */

              $names = [
            'JASON hunter',
            'eRic Schwartz',
            'mark zuckerburg '
        ];

        // Add a couple extra names to the $names array
        array_push($names, "JACob foarD  ");
        array_push($names, "Eric staAl");

        // Without writing a loop, use an array function to filter our list
        // of names down to only those who pass the score test.
        // $filteredArray = array_filter($names, function(&$name){
            
        //     $name = ucwords(strtolower(trim($name))); //Sanitize name
        //     $explodedNames = explode(" ", $name); //Creates array of exploded name
        //     $score = (stripos($name, "a") * strlen($explodedNames[count($explodedNames) -1])) / str_word_count($name); //Calculates score
        //     //echo "$name = $score </br>"; //Outputs name and score
            
        //     return ($score > 5);

        // });

        function customSort (&$name, &$b){
            
            $name = ucwords(strtolower(trim($name))); //Sanitize name
            $b = ucwords(strtolower(trim($b)));
            $explodedNames = explode(" ", $name); //Creates array of exploded name
            $explodedB = explode(" ", $b);
            $score = (stripos($name, "a") * strlen($explodedNames[count($explodedNames) -1])) / str_word_count($name); //Calculates score
            $scoreB = (stripos($b, "a") * strlen($explodedB[count($explodedB) -1])) / str_word_count($b);
            echo "$name = $score </br>"; //Outputs name and score
            echo "$b = $scoreB </br>";
            
            return ($score < $scoreB);
        }
        
        usort($names, 'customSort');
        var_dump($names);

        ?>

    </p>

    </body>
</html>