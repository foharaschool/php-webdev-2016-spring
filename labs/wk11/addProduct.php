<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Product</title>
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<!-- Form visibility script -->
<script src="visiblilty.js"></script>
</head>
<body>
<?php
    // External Code
    require_once('Product.php');
    require_once('Tools.php');
    require_once('Electronics.php');
    
    // Collect inputs from form if submitted
    if(isset($_POST['submit'])) {
        $prod_type = $_POST['product-type'];
        
        // Set form output sentinel
        $output_form = false;
        
        // Instantiate neccessary class
        $prod = new $prod_type();
        
        // Submit form
        $result = $prod->submit();
        
        // Output form again if there is an error in submitting
        if(!$result) {
            $output_form = true;
        }
        
        if($result) {
            echo '<p>You have successfully submitted a new product.</p> <a href="addProduct.php">Add Another?</a>';
        }
    } else {
        $output_form = true;
    }
    
    if($output_form) {
?>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1>Product Add Form</h1>
        </div>
        <form class="col-md-6 col-md-offset-3" role="form" name="form01" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
            <div class="form-group col-md-12">
                <label for="product-type">Select Product Type:</label>
                <select class="form-control type-origin" name="product-type" id="product-type">
                    <option value="none">Select One</option>
                    <option value="Product">Generic Products</option>
                    <option value="Tools">Tools</option>
                    <option vaue="Electronics">Electronics</option>
                </select>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-12 generic-product hidden">
                <label for="prod-name">Product Name:</label>
                <input type="text" class="form-control" name="prod-name" id="prod-name" placeholder="Product Name">
                <label for="desc">Product Description:</label>
                <input type="text" class="form-control" name="desc" id="desc" placeholder="Product Description">
                <label for="price">Product Price:</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Product Price">
                </div>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-12 tools hidden">
                <label for="tool-shipper">Choose Shipping Carrier:</label>
                <select class="form-control" name="tool-shipper" id="tool-shipper">
                    <option value="">Select One</option>
                    <option value="ups">UPS</option>
                    <option value="fedex">FedEx</option>
                    <option value="usps">USPS</option>
                </select>
                <label for="tool-weight">Weight of Tools:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="tool-weight" id="tool-weight" placeholder="Weight" aria-describedby="lbs">
                    <span class="input-group-addon" id="lbs">lbs.</span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-12 electronics hidden">
                <label for="recycle-select">Are These Electronics Recyclable?:</label>
                <div id="recycle-select">
                    <label class="radio-inline">
                        <input type="radio" name="recyclable" id="yes" value="y">Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="recyclable" id="no" value="n">No
                    </label>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-12 submit hidden">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
                <button type="reset" name="clear" id="clear" value="Clear" class="btn btn-default">Clear</button>
            </div>
            </div>
        </form>
        
    </div>
<?php
    }
?>
</body>