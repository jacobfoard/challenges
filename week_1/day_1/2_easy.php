<!-- 
	Using everything you have learned and some googling

  Imagine this is a post page and they have sent you a number
  you want to return them the number it text format. For instance:
    
    - 1 -> one
    - 2 -> two

  but anything that is above 10 we want to return "Nothing is greater than 10"
 -->

<!DOCTYPE html>
<html>
  <head></head>
	<body>
        <p>
          <?php
            $number = 3; // this came from the previous page as a post variable
            $words = array( "zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten");
          	// code goes here ...
          	if($number > 10){
          	  echo "Nothing is greather than 10";
          	}
          	echo $words[$number];
          ?>
        </p>
	</body>
</html>