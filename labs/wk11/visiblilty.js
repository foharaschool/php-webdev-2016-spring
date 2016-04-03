// Toggle visibility given product type state
$( ".type-origin" ).change(function() {
    // reset all visibility
    $(".form-group").removeClass("visible");
    $(".form-group").not(":first").addClass("hidden");
    
    // Make the necessary segments visible
    var selectedProdType = $(".type-origin").val();
    
    // Switch to make the correct toggles
    switch(selectedProdType) {
        case "none":
            $(".form-group").not(":first").addClass("hidden");
        case "Product":
            $(".generic-product").removeClass("hidden");
        case "Tools":
            $(".tools").removeClass("hidden");
    }
    
});