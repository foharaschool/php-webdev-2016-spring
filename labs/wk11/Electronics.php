<?php
    require_once('Product.php');
    class Electronics extends Product {
        
        // Create a property for holding whether the electronic product is recyclable or not
        protected $prod_type = elc;
        protected $query = "INSERT INTO products(prod_type, title, description, price, electronic_recycle) ";
        private $isRecyclable;
        
        // Create getters and setters for the property
        public function setIsRecyclable($isRecyclable) {
            $this->isRecyclable = $isRecyclable;
        }
        public function getIsRecyclable() {
            return $this->isRecyclable;
        }
        
        // The purpose of this function is to package the form inputs so that submit() does not have to be overriden
        protected function setSharedInsert() {
            $this->title = $_POST['prod-name'];
            $this->description = $_POST['desc'];
            $this->price = $_POST['price'];
            $this->isRecyclable = $_POST['recyclable'];
            
            // Convert html radio select value into boolean
            if($this->isRecyclable == 'y') {
                $this->isRecyclable = true;
            } else {
                $this->isRecyclable = false;
            }
            
            $this->query .= "VALUES('$this->prod_type', '$this->title', '$this->description', '$this->price', $this->isRecyclable)";
        }
    }
?>