<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['delete_cart_submit'])) {
            $deletedrecord = $Cart->deleteFromCart($_POST['termek_id']);
        }
    }
?>

<!-- Shopping Cart -->
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5>Bevásárló kosár</h5>
        <!-- Items in Cart -->
        <div class="row">
            <div class="col-sm-9">
                <?php 
                // $result = $product->getProduct(termek_id: 59);
                // print_r($result);
                    foreach ($product->getData('kosar') as $item ) :
                        $cart = $product->getProduct($item['termek_id']);
                        $totalSum[] = array_map(function($item){
                    // print_r($item);
                            
                        
                ?>
                <!-- Cart Item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['termek_kep'] ?>" alt="" style="height: 120px;" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5><?php echo $item['termek_nev'] ?></h5>
                        <small>Pincészet:</small>
                        <!-- Product rating -->
                        <div class="d-flex">
                            <div class="text-warning">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 text text-decoration-none"> 504 szavazat </a>
                        </div>
                        <!-- !Product rating -->

                        <!-- Product Qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex w-50">
                                <button data-id="<?php echo $item['termek_id'] ?? 0 ?>" class="qty_up border bg-light"><i class="fas fa-angle-up"></i></button>
                                <input data-id="<?php echo $item['termek_id'] ?? 0?>" type="text" class="qty_input border px-2 w-25 bg-light text-center" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['termek_id'] ?? 0?>" class="qty_down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                            <form method="POST">
                                <input type="hidden" value="<?php echo $item['termek_id'] ?? 0 ?>" name="termek_id">
                                <button type="submit" name="delete_cart_submit" class="btn text-danger px-3">Törlés</button>
                            </form>
                        </div>
                        <!-- !Product Qty -->
                    </div>
                    <!-- Product Price -->
                    <div class="col-sm-2 text-end">
                        <div class="text-danger">
                            <span class="product_price" data-id="<?php echo $item['termek_id'] ?>"><?php echo $item['termek_ar'] ?></span>&nbsp;Ft.
                        </div>
                    </div>
                    <!-- !Product Price -->
                </div>
                <!-- !Cart Item -->
                <?php 
                        return $item['termek_ar'];
                    }, $cart); // Array_map closing tag
                    // print_r($totalSum);
                    endforeach;
                ?>
            </div>
            <!-- Total price -->
            <div class="col-sm-3">
                <div class="text-center border mt-2">
                    <h6 class="freedelivery text-success py-3"><i class="fas fa-check"></i>A rendelése jogosult ingyenes házhozszállításra!</h6>
                    <div class="border-top py-4">
                        <h6>Végösszeg: <span class="text-danger"><span id="cart-total" class="text-danger"><?php echo isset($totalSum) ? $Cart->getSum($totalSum) : 0; ?></span> Ft.</span> (<span><?php echo isset($totalSum) ? count(($totalSum)) : 0; ?></span>)</h6>
                        <button type="submit" class="btn btn-warning mt-3">Rendelés leadása!</button>
                    </div>
                </div>
            </div>
            <!-- !Total price -->
        </div>
        <!-- !Items in Cart -->
    </div>
</section>
<!-- !Shopping Cart -->