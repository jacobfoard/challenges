<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <p>
        <?php
        /**
         * So we have our products, but what are we going to do with them.
         *
         * Let's create a cart that people can add products to. The cart should also be Describable.
         * Create a class called ShoppingCart that contains the following public methods.
         *
         * 1. provideDescription() - We are implmenting the Describably method after all.
         *     Come up with a good way to describe what is in your cart in this method.
         * 2. addProduct($product) - Add a product to the cart.
         *     Throw an exception if what we are adding to the cart is not of type Product
         * 3. removeOne($product) - Remove a single item that matches your product parameter.
         *     Throw an exception if your cart does not have any instances of that product in your cart
         * 4. removeAll($product) - Remove all instances of the product passed in.
         *     Throw an exception if your cart does not have any instances of that product in your cart.
         * 5. getTotalPrice() - Get the total price of all the contents in your cart.
         * 6. getAllProducts() - Get an array of all products that exist in your shopping cart.
         * 7. findProductByName($name) - Find the first instance of a product by the name passed in
         *     Throw an exception if a product is not found with that name.
         *
         * HINTS - You will be able to reuse some code in this challenge.  Think about it, removing all involves
         * removing one many times.  In your provideDescription method on your cart, you could (wink, wink) provide
         * each of your products to describe themselves.  It may also be useful to print how many items are in the cart or how much
         * the price of your total cart is.
         *
         * Perform the following tasks:
         *
         * 1. Create at least one Clothing Object and one Television Object.
         * 2. Create a shopping cart instance.
         * 3. Add the two products to the cart.
         * 4. Print out the description of the cart.
         * 5. Print out the total price of the cart.
         * 6. Remove the Clothing object from your cart.
         * 7. FInd the product in the cart with the name of your Television Object.
         * 8. Pass your ShoppingCart into the ItemDescriber outputDescription method from Exercise 4 and see
         * how it will also output the description of your cart, just like it did your individual products
         */

        ///////////////////////////
        // Put your code here!
        ///////////////////////////
        interface Describable {
            public function provideDescription(); 
        }

        abstract class Product implements Describable{
          protected $name;
          protected $price;
          protected $brand;

          public function __construct($name, $brand, $price){
            $this->name = $name;
            $this->brand = $brand;
            $this->price = $price;
          }
          
          abstract function provideDescriptionForProductType();
          
          public function provideDescription(){
            return $this->provideDescriptionForProductType();
          }
          
          public function getName(){
            if(!(empty($this->name))){
              return $this->name;
            } else{
            throw new Exception("Empty value found for name");
            }
          }
          public function getPrice(){
            if($this->price){
              if(is_numeric($this->price)){
                return $this->price;
              } else{
                throw new Exception("Invalid price");
              }
            } else {
            throw new Exception("Empty value found for price");
            }
          }
          public function getBrand(){
            if(!(empty($this->brand))){
              return $this->brand;  
            } else {
              throw new Exception("Empty value found for brand");
            }
          }
        }
        
        class Television extends Product {
          protected $displayType;
          protected $size;
          
          public function __construct($name, $brand, $price, $displayType, $size){
            parent::__construct($name, $brand, $price);
            $this->displayType = $displayType;
            $this->size = $size;
          }
          
          public function getDisplayType(){
            if(!(empty($this->displayType))){
            return $this->displayType;
            } else{
              throw new Exception("Empty value found for display type");
            }
          }

          public function getSize(){
            if(!(empty($this->size))){
            return $this->size;
            } else{
              throw new Exception("Empty value found for size");
            }
          }

          public function provideDescriptionForProductType(){
            try {
            return "This is a " . $this->getSize() . " " . $this->getBrand() . " " . $this->getDisplayType() . " Television";
            }
            catch (Exception $e){
              echo $e->getMessage();
            }
          }
        }
        
        class Clothing extends Product {
          protected $size;
          protected $type;
          protected $color;
          protected $gender;
          
          public function getSize(){
            if(!(empty($this->size))){
            return $this->size;
            } else{
              throw new Exception("Empty value found for size");
            }
          }
          public function getType(){
            if(!(empty($this->type))){
            return $this->type;
            } else{
              throw new Exception("Empty value found for type");
            }
          } 
          public function getColor(){
            if(!(empty($this->color))){
              if(($this->color == "red") or ($this->color == "blue") or ($this->color == "green") or ($this->color == "black") or ($this->color == "white") or ($this->color == "yellow")){
                  return $this->color;
              } else{
                throw new Exception("Invalid color");
              }
            } else{
              throw new Exception("Empty value found for color");
            }
          }
          public function getGender(){
           if(!(empty($this->gender))){
            return $this->gender;
           } else {
              throw new Exception("Empty value found for gender");
            }
          }

          public function __construct($name, $brand, $price, $type, $size, $color, $gender){
            parent::__construct($name, $brand, $price);
            $this->size = $size;
            $this->type = $type;
            $this->color = $color;
            $this->gender = $gender;
          }
          public function provideDescriptionForProductType(){
            try{
                return "This is an article of clothing. It is a " . $this->getBrand() . " " . $this->getColor() . " " . $this->getGender() . " " . $this->getType() . " of size " . $this->getSize() .  " it costs " . $this->getPrice(); 
              }
            catch(Exception $e){
              echo $e->getMessage();
            }
          }
        }

        class CloudMovieFile implements Describable{
            protected $title;
            protected $director;
            protected $genre;

            public function __construct($title, $director, $genre){
                $this->title = $title;
                $this->director = $director;
                $this->genre = $genre;
            }

            public function getTitle(){
                return $this->title;
            }
            public function getDirector(){
                return $this->director;
            }
            public function getGenre(){
                return $this->genre;
            }
            public function provideDescription(){
                return $this->getTitle() . " is a " . $this->getGenre() . " movie directed by " . $this->getDirector();
            }
        }

        class ItemDescriber {
          public function outputDescription($description){
            if($description instanceof Describable){
              return $description->provideDescription();
            } else {
              throw new Exception("Item is not describable");
            }
          }
        }

        class ShoppingCart implements Describable{
            public $items = array();

            public function provideDescription() {
                foreach ($this->items as $item) {
                   echo $item->provideDescription() . "</br>";
                }
            }

            public function addProduct($product) {
                if($product instanceof Product){
                    $this->items[$product->getName()] = $product;
                } else {
                    throw new Exception("Error adding product, product is not a Product");
                }
            }

            public function removeOne($product) {
                if(in_array($product, $this->items)){
                    unset($this->items[$product->getName()]);
                } else {
                    throw new Exception("Product is not in the cart");
                }
            }

            public function removeAll() {
                if(!(empty($this->items)) and is_array($this->item)){
                    foreach ($this->items as $item) {
                        $this->removeOne($item);
                    }    
                } else {
                    throw new Exception("There are no items in the cart");
                }
            }

            public function getTotalPrice() {
                $total = 0;
                
                foreach ($this->items as $item) {
                    $total = $item->getPrice() + $total;
                }
                return $total;
            }

            public function getAllProducts() {
                return $this->items;
            }

            public function findProductByName($name) {
                $itemKey = null;
                foreach ($this->items as $key => $item) {
                  if($name == $item->getName()){
                    $itemKey = $key + 1;
                    echo "$name is number $itemKey in the array";
                    break;
                  }
                }
                if($itemKey == null){
                  throw new Exception("Item was not found in cart");
                }
            }
        }

        
        $describer = new ItemDescriber();
        $kramericaTV = new Television("Giant TV", "Kramerica", 3900.90, "LED", "100in");
        $shirt = new Clothing("Button Down Shirt", "J Peterman", '29.88', "shirt","medium", "red", "male");
        $cart = new ShoppingCart();
        $cart->addProduct($kramericaTV);
        $cart->addProduct($shirt);
        $cart->provideDescription();
        echo "</br>";
        echo "The cart total price is $" . $cart->getTotalPrice();
        $cart->removeOne($shirt);
        $cart->findProductByName("Giant TV");
        $describer->outputDescription($cart);

        ?>
    </p>
  </body>
</html>