<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="./style.css?v=5">

    <?php
        // require (connection) functions
        require ("./functions.php");
    ?>

</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="strip px-4 py-1 bg-light">
            <div class="d-flex justify-content-end">
                <a href="./login.php" class=" text-decoration-none px-3 border border-top-0 border-bottom-0 text-dark">Register</a>
                <a href="./login.php" class=" loga text-decoration-none px-3 text-dark">Login</a>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <a class="navbar-brand px-2" href="#"><img class="logo-img" src="./assets/itc logo.jpg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rólunk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productspage.php">Kínálat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li>
                        <form class="form-inline my-2 my-lg-0 d-flex justify-content-end">
                            <input class="form-control mr-sm-2 mx-2" type="search" placeholder="" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Keresés</button>
                        </form>
                    </li>
                </ul>
                <form action="#" class="px-2">
                    <a href="cartpage.php" class="text-decoration-none py-2 rounded-pill bg-primary">
                        <span class="px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text dark bg-light"><?php echo count($product->getData('kosar')) ?></span>
                    </a>
                </form>
            </div>
        </nav>
    </header>
    <!-- !Header -->

    <!-- Main Site -->
    <main>