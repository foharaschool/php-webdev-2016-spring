<?php
    require_once('connectvars.php');
    class Product {
        
        // Create properties for holding a title, description, and price
        protected $prod_type = gen;
        protected $query = "INSERT INTO products(prod_type, title, description, price) ";
        protected $title;
        protected $description;
        protected $price;
        
        // Create getters and setters for all the properties
        public function setTitle($title){
            $this->title = $title;
        }
        public function setDescription($description){
            $this->description = $description;
        }
        public function setPrice($price){
            $this->price = $price;
        }
        
        public function getTitle() {
            return $this->title;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getPrice() {
            return $this->price;
        }
        
        // The purpose of this function is to package the form inputs so that submit() does not have to be overriden
        protected function setSharedInsert() {
            $this->title = $_POST['prod-name'];
            $this->description = $_POST['desc'];
            $this->price = $_POST['price'];
            $this->query .= "VALUES('$this->prod_type', '$this->title', '$this->description', '$this->price')";
        }
        
        // The purpose of this function is to validate form inputs, insert into DB, and return submission success
        public function submit() {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('There was a problem connecting to the database');
            
            // Set inputs and query
            $this->setSharedInsert();
            
            // Run insert
            mysqli_query($dbc, $this->query)
                    or die('There was a problem running the insert query');
                
            // Close DB connection
            mysqli_close($dbc);
            
            return true;
        }
    }
?>