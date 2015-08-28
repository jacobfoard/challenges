<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <p>
        <?php
        /**
         * OVERVIEW:
         * We've decided we want to add "wishlist" functionality to our site.  If you think about it,
         * a Wishlist is just a container that holds items just like a ShoppingCart. One major difference,
         * however, is that you can only add a product to a wishlist once.  Make sure that you account for this
         * functionality in your wishlist by using exceptions.  Remember that you can override behavior in inheritance and
         * how abstract classes work.  We are going to change the structure of your ShoppingCart Class from
         * the first Challenge so that we can re-use the code in a Wishlist.
         *
         * INSTRUCTIONS:
         * 1. Create an abstract class called ProductContainer.  This class should contain all of the behavior that
         * was included in your shopping cart from Challenge 1 that will be shared between your WishList and ShoppingCart.
         * Any behavior that should be different between the WishList and ShoppingCart should be written as an abstract
         * method.
         * 2. Create a ShoppingCart class that extends the Product Container class.  Implement the abstract methods that you
         * specified in step1 in your ShoppingCart method.
         * 3. Create a WishList class that extends the Product Container class.  Implement the abstract methods that you
         * specified in step1 in your WishList method.
         * 4. Override the provideDescription method in each child class to add "Container Type: " and whether it is a
         * ShoppingCart or WishList.  Remember how to reference the parent class to utilize its behavior.
         * 5. Create a static method on the ProductContainer class called createCartFromContainer($productContainer).  This
         * Method should take in any ProductContainer as a parameter.  It should then copy the contents of the container
         * that is passed in to a new instance of a ShoppingCart and return the ShoppingCart.  If the parameter $productContainer
         * that is passed into the static method is not a ProductContainer, throw an exception.
         * 6. Create at least one Clothing object and one Television Object from Exercise 2.
         * 7. Create a Wishlist Object
         * 8. Add each of the Products to your Wishlist.
         * 9. Now create a ShoppingCart that Mirrors your wishlist by calling the createCartFromContainer method.
         * 10. Print out the description (provideDescription) of both your wishlist and your shopping cart to make sure that
         * they have the same products in them.
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

          public function provideDescriptionForProductType(){ //Todo fix this
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
          public function provideDescriptionForProductType(){ // TODO: fix this
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
        abstract class ProductContainer implements Describable {
                    abstract function provideDescription();
                    abstract function addProduct($product);
                    abstract function removeOne($product);
                    abstract function removeAll();
                    abstract function getTotalPrice();
                    abstract function getAllProducts();
                    abstract function findProductByName($name);
                    public static function createCartFromContainer($productContainer) {
                        $ShoppingCart = new ShoppingCart();
                        if($productContainer instanceof ProductContainer) {
                          $products = $productContainer->getAllProducts();
                          foreach($products as $product){
                            $ShoppingCart->addProduct($product);
                          }
                          return $ShoppingCart;
                        } else {
                            throw new Exception("Error, unable to create cart from container. Container is not a Product Container");
                        }
                    }
        }

        class ShoppingCart extends ProductContainer {
            public $items = array();

            public function provideDescription() {
                echo "Container Type: Shopping Cart </br>";
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
                if(!(empty($this->items))){
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


        class WishList extends ProductContainer{
            public $items = array();

            public function provideDescription() {
                echo "Container Type: Wish List </br>";
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
                if(!(empty($this->items))){
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
        $Wishlist = new WishList();
        $Wishlist->addProduct($kramericaTV);
        $Wishlist->addProduct($shirt);
        $ShoppingCart = $Wishlist->createCartFromContainer($Wishlist);
        $Wishlist->provideDescription();
        $ShoppingCart->provideDescription();
        ?>
    </p>
  </body>
</html>