$(document).ready(function(){

    // Product qty
    let $qty_up = $(".qty .qty_up");
    let $qty_down = $(".qty .qty_down");
    // let $input = $(".qty .qty_input")

    $qty_up.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`)
        if ($input.val() >= 1 && $input.val() <= 9) {
            $input.val(function(i, oldval){
                return ++oldval;
            })
        }
    });

    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`)
        if ($input.val() > 1 && $input.val() <= 10) {
            $input.val(function(i, oldval){
                return --oldval;
            })
        }
    });

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

});