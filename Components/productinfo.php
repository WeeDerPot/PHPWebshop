<?php 
    // Request Method POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['productinfo_submit'])) {
            // call method addToCart
            $Cart->addToCart( $_POST['user_id'],$_POST['termek_id']);
        }
    }

    $item_id = $_GET['termek_id'] ?? 50;
    foreach($product->getData() as $item) :
        if ($item['termek_id'] == $item_id) :
?>

<!-- Product page -->
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-center">
                <img src="<?php echo $item['termek_kep'] ?>" alt="<?php echo $item['termek_nev'] ?>" class="img-fluid single-img mt-3">
            </div>

            <!-- Product info -->
            <div class="col-sm-6">
                <h5><?php echo $item['termek_nev'] ?></h5>
                <small>Pincészet:</small>
                <div class="d-flex">
                    <div class="text-warning">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 text text-decoration-none"> 504 szavazat | 50+ megválaszolt kérdés</a>
                </div>
                <hr class="m-0">
                <table class="my-3">
                    <tr>
                        <td>Teljes ár:&nbsp;</td>
                        <td><strike>5000 Ft.</strike></td>
                    </tr>
                    <tr>
                        <td>Akciós ár:&nbsp;</td>
                        <td class="text-danger"><span><?php echo $item['termek_ar'] ?></span>  Ft.<small class="text-dark">&nbsp;&nbsp; Áraink az ÁFÁ-t tartalmazzák</small></td>
                    </tr>
                </table>
                <hr>
                <div class="d-flex flex-column text-dark">
                    <p>A bor jellege: <span><?php echo $item['jelleg'] ?></span></p>
                    <p>A bor típusa: <span><?php echo $item['tipus'] ?></span></p>
                    <p>Származtató borvidék: <span><?php echo $item['videk'] ?></span></p>
                    <br>
                    <h6>Termék leírás:</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ipsum nulla. Pellentesque a metus diam. Quisque tempus purus lectus, ut mattis felis porta sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce posuere scelerisque eleifend. Integer aliquet congue nulla, at ultricies lectus pulvinar id. Vivamus mollis tortor eu neque hendrerit tincidunt. Quisque est leo, semper nec congue at, elementum at urna.</p>
                    <!-- Product qty -->
                    <div class="qty d-flex mt-3">
                        <h6>Mennyiség: </h6>
                        <div class="px-3 d-flex">
                            <button data-id="<?php echo $item['termek_id'] ?>" class="qty_up border bg-light"><i class="fas fa-angle-up"></i></button>
                            <input data-id="<?php echo $item['termek_id'] ?>" type="text" class="qty_input border px-2 w-25 bg-light text-center" disabled value="1" placeholder="1">
                            <button data-id="<?php echo $item['termek_id'] ?>" class="qty_down border bg-light"><i class="fas fa-angle-down"></i></button>
                        </div>
                    </div>
                    <!-- !Product qty -->
                    <form method="POST">
                        <input type="hidden" name="user_id" value="<?php echo 1 ?>">
                        <input type="hidden" name="termek_id" value="<?php echo $item['termek_id'] ?>">
                        <button type="submit" name="productinfo_submit" class="btn btn-danger form-control w-50 mt-4">Kosárba helyezés!</button>
                    </form>
                </div>
            </div>
            <!-- !Product info -->
        </div>
    </div>
</section>
<!-- !Product page -->

<?php 
    endif;
    endforeach;
?>