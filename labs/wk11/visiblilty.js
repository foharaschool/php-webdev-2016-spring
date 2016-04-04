$(document).ready(function() {
    // Toggle visibility given product type state
    $(".type-origin").change(function() {
        console.log('it is recognizing the change state');
        // reset all visibility
        $(".form-group").not(":first").addClass("hidden");
        
        // Make the necessary segments visible
        var selectedProdType = $(".type-origin").val();
        
        // Switch to make the correct toggles
        switch(selectedProdType) {
            case "none":
                $(".form-group").not(":first").addClass("hidden");
                break;
            case "Product":
                $(".generic-product, .submit").removeClass("hidden");
                break;
            case "Tools":
                $(".generic-product, .tools, .submit").removeClass("hidden");
                break;
            case "Electronics":
                $(".generic-product, .electronics, .submit").removeClass("hidden");
                break;
            default:
                console.log('default');
        }
        
    });
    
    // Return to Select One on clear
    $('#clear').on( "click", function() {
        $(".type-origin").val("none");
        $(".form-group").not(":first").addClass("hidden");
    });
});