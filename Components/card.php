<?php
    $product_list = $product->getData();

    // Request Method POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['card_submit'])) {
            // call method addToCart
            $Cart->addToCart( $_POST['user_id'],$_POST['termek_id']);
        }
    }
?>
<div id="filters" class="sidenav bg-light border border-info d-none d-md-block button-group">
    <button data-filter="*" > Minden termék</button>
    <button data-filter=".Sopron" >Sopron</button>
    <button data-filter=".Nagy-Somló" >Nagy-Somló</button>
    <button data-filter=".Zala" >Zala</button>
    <button data-filter=".Balatonfelvidék" >Balaton felvidék</button>
    <button data-filter=".Badacsony" >Badacsony</button>
    <button data-filter=".Balatonfüred" >Balatonfüred</button>
    <button data-filter=".Balatonboglár" >Balatonboglár</button>
    <button data-filter=".Pannonhalma" >Pannonhalma</button>
    <button data-filter=".Mór" >Mór</button>
    <button data-filter=".Tolna" >Tolna</button>
    <button data-filter=".Szekszárd" >Szekszárd</button>
    <button data-filter=".Pécs" >Pécs</button>
    <button data-filter=".Kunság" >Kunság</button>
    <button data-filter=".Mátra" >Mátra</button>
    <button data-filter=".Eger" >Eger</button>
    <button data-filter=".Bükk" >Bükk</button>
    <button data-filter=".Tokaj" >Tokaj</button>
</div>

<div class="container">
<div class="row mt-5 mb-5 justify-content-center grid">
    <!-- Product card -->
    <?php foreach($product_list as $item) {?>
    <div class="grid-item card mt-5 mx-3 bg-light border-info <?php echo str_replace(' ', '',  $item['videk']) ?>" style="width: 18rem;">
        <img class="pt-2" style="height: 350px;" src="<?php echo $item['termek_kep'] ?>" alt="<?php echo $item['termek_nev'] ?>">
        <div class="card-body pb-0">
            <h5 class="card-title"><?php echo $item['termek_nev'] ?></h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <hr>
            <P>Borvidék: <?php echo $item['videk'] ?></P>
            <P>Bor típusa: <?php echo $item['tipus'] ?></P>
            <P>Bor jellege: <?php echo $item['jelleg'] ?></P>
            <h6>Ár: <span class="text-danger"><?php echo $item['termek_ar'] ?></span> Ft.</h6>
        </div>
        <div class="card-body text-center">
            <!-- QTY Button -->
            <div class="qty d-flex">
                <div class="pb-2 justify-content-center d-flex pt-0">
                    <button data-id="<?php echo $item['termek_id'] ?>" class="qty_up border bg-light"><i class="fas fa-angle-up"></i></button>
                    <input data-id="<?php echo $item['termek_id'] ?>" type="text" class="qty_input border px-2 w-25 bg-light text-center" disabled value="1" placeholder="1">
                    <button data-id="<?php echo $item['termek_id'] ?>" class="qty_down border bg-light"><i class="fas fa-angle-down"></i></button>
                </div>
            </div>
            <a href="singleproductpage.php?termek_id=<?php echo $item['termek_id'] ?>" class="card-link">Termék megtekintése!</a>
            <form method="POST">
                <input type="hidden" name="user_id" value="<?php echo 1 ?>">
                <input type="hidden" name="termek_id" value="<?php echo $item['termek_id'] ?>">
                <button type="submit" name="card_submit" class="btn btn-primary mt-2">Kosárba!</button>
            </form>
        </div>
    </div>
    <?php } ?> <!-- Foreach closing tag -->
    <!-- !Product card -->
</div>
</div>

<!--     -->