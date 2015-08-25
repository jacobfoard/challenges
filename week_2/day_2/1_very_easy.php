<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <p>
        <?php

            /**
             * Write a function that takes a "name" and "number" (n)
             * print the name (n) times
             */
          function repeatName($name, $num){
            for($i = 0; $i < $num; $i++){
              echo $name . "</br>";
            }
          }
            repeatName("Jacob", 10)


        ?>
    </p>
  </body>
</html>