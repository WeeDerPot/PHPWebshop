<?php
ob_start();
// Header component
    include('header.php');
?>

<!-- Main -->
<?php
    include('./Components/shoppingcart.php');
?>
<!-- !Main -->

<?php
// Footer component
    include('footer.php');
?>