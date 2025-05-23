<?php

include '../src/check_token.php';
?>

<!DOCTYPE html>
<html lang="hu, en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="max-image-preview:large">
    <meta name="keywords" content="Online könyváruház, Könyvvásárlás, Új könyvek, Legjobb könyvek, E-könyvek, Akciós könyvek, Könyvajánlók, Olvasás, Irodalom, Tankönyvek">
    <meta name="description" content="Fedezd fel a legjobb online könyváruházat, ahol széles könyvválaszték, akciók és gyors szállítás vár! Vásárolj biztonságosan és élvezd az olvasást!">
    <meta name="author" content="Taylor Team">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Hungarian">

    <!-- Link -->
    <link rel="canonical" href="https://bookshop.hu">
    <link rel="alternate" href="https://bookshop.hu" hreflang="hu">
    <link rel="alternate" href="https://bookshop.hu" hreflang="en">
    <link rel="icon" href="" sizes="32x32" type="image/png">
    <link rel="icon" href="" sizes="16x16" type="image/png">
    <link rel="apple-touch-icon" href="https://bookshop.hu">
    <link rel="preload" href="./css/index.css" as="style" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <!-- Additional CSS -->
    <link rel="stylesheet" href="./css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Oxanium' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Oldal címe -->
    <title>Book Shop</title>

    <!-- Open Graph a közösségi médiához -->
    <meta property="og:locale" content="hu">
    <meta property="og:site_name" content="Bookshop">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Legjobb online könyvesbolt 2025-ben">
    <meta property="og:description"
        content="Fedezd fel a legjobb online könyváruházat! Bestseller és ritka könyvek, friss megjelenések, akciók és ajánlások egy helyen. Csatlakozz most!">
    <meta property="og:image" content="./img_head/bookstore_logo.png">
    <meta property="og:url" content="https://bookshop.hu">
    <meta property="og:type" content="website">
    <meta property="og:image:width" content="335">
    <meta property="og:image:height" content="281">
    <meta property="og:site_name" content="Bookshop">
    <meta property="article:publisher" content="Taylor Team">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta property="og:title" content="Legjobb online könyvesbolt 2025-ben">
    <meta property="og:description"
        content="Fedezd fel a legjobb online könyváruházat! Bestseller és ritka könyvek, friss megjelenések, akciók és ajánlások egy helyen. Csatlakozz most!">
    <meta name="twitter:image" content="./img_head/bookstore_logo.png">
    <meta name="twitter:creator" content="Taylor Team">
    <meta name="twitter:domain" content="https://bookshop.hu">
    <meta name="twitter:label1" content="Bookshop Project">
    <meta name="twitter:data1" content="Szépirodalom">

    <!-- For better loading time -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
</head>



<body>

<?php 
    //Beloginolt állapot
    $isLoggedIn = isset($_SESSION['name']) ? 'true' : 'false';
?>

<script>
    //php átadja a jsnek (szerencsére csak így lehet megoldani)
    var isLoggedIn = <?php echo json_encode($isLoggedIn); ?>;
    console.log(isLoggedIn); 
</script>





    <header>
<!-- Top Navigation -->
<nav class="navbar navbar-light">
    <div class="container-xl d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="Logo" height="40px">
        </a>

        <!-- Search Bar -->
        <form class="form-inline search-bar m-0">
            <i class="fas fa-search search-icon"></i> <!-- Search Icon -->
            <input class="form-control" type="search" placeholder="Keresés" aria-label="Search" width="100%"
                id="searchInput">
        </form>

        <!-- Ikonok és modalok -->
        <div class="d-flex">
            <?php if (isset($_SESSION['name'])): ?>
                <!-- Modal (Wishlist) -->
                <div id="wishlistModal" class="modal">
                    <div class="modal-content">
                        <span class="close" id="close-wishlist">&times;</span>
                        <h2>Kívánságlista</h2>
                        <div id="wishlist-items"></div>
                        <p class="total-items">Összesen: <span id="wishlist-count">0</span> termék</p>
                    </div>
                </div>

                <!-- Wishlist ikon -->
                <a href="#" class="mr-3" id="wishlist-icon">
                    <i class="fas fa-heart"></i>
                </a>
            <?php endif; ?>

            <!-- Kosár ikon (mindig látható) -->
            <a href="#" class="mr-3" id="cart-icon">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>

            <!-- Modal (Cart) -->
        <div id="cartModal" class="modal">
            <div class="modal-content">
                <span class="close" id="close-modal">&times;</span>
                <h2>Kosár tartalma</h2>
                <div id="cart-items">
                    <p></p>
                </div>
                <p class="total-amount"></p>
                <button id="checkout-btn" class="checkout-btn" style="display: none;"><a href="checkout.php">Tovább a fizetéshez</a></button>
            </div>
        </div>


        <!-- Logged in user drop down Menu -->
        <?php if (isset($_SESSION['name'])): ?>
            <div class="dropdown">
                <a href="#" class="mr-3 dropdown-toggle" id="userDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Üdv, <?php echo htmlspecialchars($_SESSION['name']); ?>!
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a href="game://Game/?userid=<?php echo $authenticator->currentUserId ?>" class="dropdown-item">Játék</a>
                    <?php if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1): ?>
                        <a href="admin/admin.php" class="dropdown-item">Admin page</a>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="../php/logout.php">Kijelentkezés</a>
                </div>
            </div>
        <?php else: ?>
            <a href="logination.php" class="mr-3" id="nav-hover">Bejelentkezés</a>
            <a href="registration.php" id="nav-hover">Regisztráció</a>
        <?php endif; ?>
    </div>
</nav>

<div id="cart-feedback" class="feedback">A könyv a kosárba került!</div>
<div id="wishlist-feedback" class="feedback">A könyv a kívánságlistába került!</div>


        <!-- MODAL -->
        <div id="bookResultsBackdrop"></div>

        <!-- Results -->
        <div id="bookResults"></div>


        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-xl d-flex justify-content-center">
                <!-- Navbar Content -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="info/ekonyv_frontend.php">Ekönyvek</a></li>
                        <li class="nav-item"><a class="nav-link" href="info/uj-konyvek-frontend.php">Új könyvek</a></li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="bestsellersDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Best Sellers
                            </a>
                            <div class="dropdown-menu" aria-labelledby="bestsellersDropdown">
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=34">Vaják I.</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=53">Egy Jomsviking története</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=100">Batman Fehér Lovag</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=261">A Pékmesterség Nagykönyve</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=40">A Hobbit</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=9">Az inkvizíció</a>
                            </div>
                        </li>


                        <li class="nav-item"><a class="nav-link" href="info/szepirodalom_frontend.php">Szépirodalmi</a></li>
                        <li class="nav-item"><a class="nav-link" href="info/ismeretterjeszto_frontend.php">Ismeretterjesztő</a></li>
                        <li class="nav-item"><a class="nav-link" href="info/ifjusagi_frontend.php">Gyerekeknek</a></li>
                        <li class="nav-item"><a class="nav-link" href="info/kepregeny_frontend.php">Képregények</a></li>
                   

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php" id="booksDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Különleges ajánlat
                            </a>
                            <div class="dropdown-menu" aria-labelledby="booksDropdown">
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=45">A Pál utcai fiúk</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=163">2084</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=307">Idő - Khronosz megölésének álma</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=226">A háború művészete</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=204">Baranyavármegye nemesei</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=72">A kis herceg - kartonált</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=258">A borkezelésről</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=297">Az ég atlasza</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=199">A mohácsi csata</a>
                                <a class="dropdown-item" href="/bookshop/web/info/info_frontend.php?bookId=288">A PI története</a>
                                <div class="dropdown-divider"></div>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='success-message' style='color: white; margin: 10px; text-align:center'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']);
        }
    ?>

    <main class="container mt-5"></main>


    <!-- Footer-->
    <footer>
        <div class="footer-links">
            <div class="footer-info">
                <div class="footer-images-help">
                    <!-- Footer Ikons-->
                    <div class="footer-images">
                    <i class="fa fa-book" style="font-size: 44px;"></i> 
                    <i class="fa fa-truck" style="font-size: 40px;"></i> 
                    <i class="fa fa-credit-card" style="font-size: 40px;"></i> 
                    <i class="fa fa-lock" style="font-size: 44px;"></i> 
                    </div>

                    <!-- Info box -->
                    <p class="footer-help-text">Vásárolj könyveket nálunk!</p>
                    <div class="footer-help-contact">
                        <div class="footer-contact">
                            <i class="fa fa-phone"></i>
                            <div class="contact-info">
                                <span>36 2 129 66</span>
                            </div>
                        </div>
                        <p class="info-warning">Könyveink ára tartalmazza az ÁFÁ-t!</p>
                    </div>
                </div>

                <!-- Footer motivation description -->
                <div class="footer-description-follow">
                    <p class="footer-description">
                        Merülj el a könyvek lenyűgöző világában, és találd meg a tökéletes olvasmányt a Bookshop.hu
                        kínálatában! Akár a legújabb bestsellerekre, akár az örök klasszikusokra vágysz, nálunk mindent
                        megtalálsz, hogy felfedezd a tudás, kaland és fantázia határtalan világát. Vásárolj most, és
                        élvezd a könyvek varázslatos világát, ahol minden egyes oldal új élményt kínál!
                    </p>

                    <!-- Links -->
                    <div class="footer-follow">
                        <p id="footer_follow_p">Kövess minket:</p>
                        <p id="footer_follow_i">
                            <i class="fa fa-facebook"></i>
                        </p>
                    </div>
                </div>

                <!-- Contracts, infos -->
                <div class="footer-legal">
                    <a href="cookie.php"> Cookie tájékoztató</a> |
                    <a href="adatvedelem.php">Adatvédelem</a> |
                    <a href="aszf.php"> Általános szerződési feltételek</a> |
                    <span>Copyright © 2025 bookshop.hu | Minden jog fenntartva</span>
                </div>
            </div>
        </div>
    </footer>


    <div id="decoration"></div>

     <!-- Query, popper and bootstrap cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

     <!-- JS -->
    <script src="./js/wishlish_manager.js"></script>
    <script src="./js/cart.js"></script>
    <script src="./js/whislist.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/decorate.js"></script>
    <script src="./js/searchbar.js"></script>
</body>
</html>