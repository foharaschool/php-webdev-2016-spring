<?php
    require_once('Product.php');
    class Tools extends Product {
        // Create properties for holding a shipper (i.e. UPS, FedEx, USPS), and weight
        protected $prod_type = tls;
        protected $query = "INSERT INTO products(prod_type, title, description, price, tool_shipping_provider, tool_weight) ";
        private $shipper;
        private $weight;
        
        
        // Create getters and setters for all the properties
        public function setShipper($shipper) {
            $this->shipper = $shipper;
        }
        public function setWeight($weight) {
            $this->weight = $weight;
        }
        
        public function getShipper() {
            return $this->shipper;
        }
        public function getWeight() {
            return $this->weight;
        }
        
        // The purpose of this function is to package the form inputs so that submit() does not have to be overriden
        protected function setSharedInsert() {
            $this->title = $_POST['prod-name'];
            $this->description = $_POST['desc'];
            $this->price = $_POST['price'];
            $this->shipper = $_POST['tool-shipper'];
            $this->weight = $_POST['tool-weight'];
            $this->query .= "VALUES('$this->prod_type', '$this->title', '$this->description', '$this->price', '$this->shipper', '$this->weight')";
        }
    }
?>