$(document).ready(function(){

    // Product qty
    let $qty_up = $(".qty .qty_up");
    let $qty_down = $(".qty .qty_down");
    let $cart_total = $("#cart-total");
    // let $input = $(".qty .qty_input")

    /*$qty_up.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`)
        if ($input.val() >= 1 && $input.val() <= 9) {
            $input.val(function(i, oldval){
                return ++oldval;
            })
        }
    });*/

    /*$qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`)
        if ($input.val() > 1 && $input.val() <= 10) {
            $input.val(function(i, oldval){
                return --oldval;
            })
        }
    });*/

    // Isotope filter
    var $grid = $(".grid").isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    // Filter item on button click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({ filter: filterValue });
    })

    $qty_up.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`)
        let $price = $(`.product_price[data-id ='${$(this).data("id")}']`);
    
        // Increase product price using ajax call
        $.ajax({ 
            url : "Components/ajax.php", 
            type: 'post', 
            data: {itemid : $(this).data("id")},
            success:function($ajaxresult){
            
            // console.log($ajaxresult);
            let obj = JSON.parse($ajaxresult);
            let termek_ar = obj[0]['termek_ar'];
            
            if ($input.val() >= 1 && $input.val() <= 9) {
                $input.val(function(i, oldval){
                    return ++oldval;
                })
                // Increase preice of product
                $price.text(parseInt(termek_ar * $input.val()));

                // set Total price
                let totalprice = parseInt($cart_total.text()) + parseInt(termek_ar);
                $cart_total.text(totalprice);
            }
    
        } });   // Closing ajax request  
    });

    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id ='${$(this).data("id")}']`);

        // Decrease product price using ajax call
        $.ajax({ 
            url : "Components/ajax.php", 
            type: 'post', 
            data: {itemid : $(this).data("id")},
            success:function($ajaxresult){
            
            // console.log($ajaxresult);
            let obj = JSON.parse($ajaxresult);
            let termek_ar = obj[0]['termek_ar'];
            
            if ($input.val() > 1 && $input.val() <= 10) {
                $input.val(function(i, oldval){
                    return --oldval;
                })

                // Decrease preice of product
                $price.text(parseInt(termek_ar * $input.val()));

                // set Total price
                let totalprice = parseInt($cart_total.text()) - parseInt(termek_ar);
                $cart_total.text(totalprice);
            }
    
        } });   // Closing ajax request

    });

});