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
    <meta name="keywords" content="Online bookstore, Book purchase, New books, Best books, Special editions, E-books, Discounted books, Book recommendations, Reading, Literature, Adult books, Children's books, Classic books, Most popular books, Online book shopping, Textbooks, Bookstore promotions, Bookstore offers">
    <meta name="description" content="Discover the best online bookstore where you can find a wide selection of books in various genres, including the latest releases, bestsellers, classics, and special editions. Our platform offers detailed and honest reviews of books, as well as updated information on discounts, special offers, and promotions. Whether you're looking for fiction, non-fiction, children's books, or textbooks, we have something for everyone. Enjoy a seamless shopping experience with secure payments and fast delivery options. Start exploring our collection today and find your next great read at the best prices. Join now and enjoy reading like never before!">
    <meta name="author" content="Taylor Team">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Hungarian">

    <!-- Link -->
    <link rel="canonical" href="">
    <link rel="alternate" href="" hreflang="hu">
    <link rel="alternate" href="" hreflang="en">
    <link rel="icon" href="" sizes="32x32" type="image/png">
    <link rel="icon" href="" sizes="16x16" type="image/png">
    <link rel="apple-touch-icon" href="">
    <link rel="preload" href="./css/index.css" as="style" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">




    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
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
    <meta property="og:title" content="Best Online Bookstore for Book Lovers in 2025">
    <meta property="og:description" content="Explore the best online bookstore for a wide selection of books, from bestsellers to rare editions. Stay updated with the latest book releases, offers, and recommendations. Join the community of readers today!">
    <meta property="og:image" content="./img_head/bookstore_logo.png">
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:image:width" content="335">
    <meta property="og:image:height" content="281">
    <meta property="og:site_name" content="">
    <meta property="article:publisher" content="">



    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta property="og:title" content="Best Online Bookstore for Book Lovers in 2025">
    <meta property="og:description" content="Explore the best online bookstore for a wide selection of books, from bestsellers to rare editions. Stay updated with the latest book releases, offers, and recommendations. Join the community of readers today!">
    <meta name="twitter:image" content="">
    <meta name="twitter:creator" content="">
    <meta name="twitter:domain" content="">
    <meta name="twitter:label1" content="Bookshop Project">
    <meta name="twitter:data1" content="The witcher">


    <!-- For better loading time -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
            



</head>
<body>
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
                <input class="form-control" type="search" placeholder="Keresés" aria-label="Search" width="100%">
            </form>

            <div class="d-flex">
                <div id="wishlistModal" class="modal">
                    <div class="modal-content">
                        <span class="close" id="close-wishlist">&times;</span>
                        <h2>Kívánságlista</h2>
                        <div id="wishlist-items"></div>
                        <p class="total-items">Összesen: <span id="wishlist-count">0</span> termék</p>
                    </div>
                </div>

                <!-- tsuki ikon -->
                <a href="#" class="mr-3" id="wishlist-icon">
                    <i class="fas fa-heart"></i>
                </a>
                <!-- Kosár ikon -->
                <a href="#" class="mr-3" id="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>

            <!-- Modal -->
            <div id="cartModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="close-modal">&times;</span>
                    <h2>Kosár tartalma</h2>
                    <p></p> 
                    <p class="total-amount">
                </div>
            </div>

            <?php if (isset($_SESSION['name'])): ?>
            <div class="dropdown">
                <a href="#" class="mr-3 dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    Üdv, <?php echo htmlspecialchars($_SESSION['name']); ?>!
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profile.php">Profilom</a>
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

        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-xl d-flex justify-content-center">
                <!-- Navbar Content -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php" id="booksDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ekönyvek
                            </a>
                            <div class="dropdown-menu" aria-labelledby="booksDropdown">
                                <a class="dropdown-item" href="">asd</a>
                                <a class="dropdown-item" href="">asd</a>
                                <a class="dropdown-item" href="">asd</a>
                                <a class="dropdown-item" href="">asd</a>
                                <a class="dropdown-item" href="">asd</a>
                                <a class="dropdown-item" href="">asd</a>
                                <a class="dropdown-item" href="">asd</a>
                                <a class="dropdown-item" href="">asd</a>
                                <a class="dropdown-item" href="">asd</a>
                                <a class="dropdown-item" href="">asd</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php">Összes Könyv</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="">Új könyvek</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="bestsellersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Best Sellers
                            </a>
                            <div class="dropdown-menu" aria-labelledby="bestsellersDropdown">
                                <a class="dropdown-item" href="">Szépirodalmi</a>
                                <a class="dropdown-item" href="">Ismeretterjesztő</a>
                                <a class="dropdown-item" href="">Gyerekeknek</a>
                                <a class="dropdown-item" href="">Angol könyvek</a>
                                <a class="dropdown-item" href="">Ifjúsági</a>
                                <a class="dropdown-item" href="">Különleges ajánlat</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="">Szépirodalmi</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Ismeretterjesztő</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Gyerekeknek</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Angol könyvek</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Ifjúsági</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Különleges ajánlat</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5"></main>

    <a href="game://Game" target="_blank">Cuccos</a>


    <?php if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1): ?>
        <a href="admin/admin.php">Admin page</a>
    <?php endif; ?>

    <!--
        <footer>
            <div class="footer-links">
                <div class="footer-links text-center">
                    <div class="dropdown d-inline-block">
                        <a class="dropdown-toggle" href="#" id="kaszinokDropdownFooter" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kaszinók
                        </a>
                        <div class="dropdown-menu text-center" aria-labelledby="kaszinokDropdownFooter">
                            <a class="dropdown-item" href="../web/velemenyek/wonaco.html">Wonaco</a>
                                    <a class="dropdown-item" href="../web/velemenyek/dollycasino.html">DollyCasino</a>
                                    <a class="dropdown-item" href="../web/velemenyek/staxino.html">Staxino</a>
                                    <a class="dropdown-item" href="../web/velemenyek/flappycasino.html">Flappycasino</a>
                                    <a class="dropdown-item" href="../web/velemenyek/flappycasino.html">Wintopia</a>
                                    <a class="dropdown-item" href="../web/velemenyek/betflare.html">Betflare</a>
                                    <a class="dropdown-item" href="../web/velemenyek/casinoinfinity.html">Casinoinfinity</a>
                                    <a class="dropdown-item" href="../web/velemenyek/ninlay.html">Ninlay</a>
                                    <a class="dropdown-item" href="../web/velemenyek/spinsala.html">Spinsala</a>
                                    <a class="dropdown-item" href="../web/velemenyek/tsars.html">Tsars</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.html">Összes kaszinó</a>
                        </div>
                    </div>
                    <a class="d-block" href="bonus/bonus.html">Bónuszok</a>
                    <a class="d-block" href="hozzaferes/korlatozott_hozzaferes.html">Nyerőgépek</a>
                    <a class="d-block" href="hozzaferes/korlatozott_hozzaferes.html">Sportfogadás</a>
                    <a class="d-block" href="hozzaferes/korlatozott_hozzaferes.html">Ingyenes pörgetés</a>
                    <a class="d-block" href="hozzaferes/korlatozott_hozzaferes.html">Fizetési Módok</a>
                    <a class="d-block" href="hozzaferes/korlatozott_hozzaferes.html">Új Kaszinók</a>
                    <a class="d-block" href="hozzaferes/korlatozott_hozzaferes.html">Rólunk</a>
                    <a class="d-block" href="hozzaferes/korlatozott_hozzaferes.html">Kapcsolat</a>
                </div>
            
            
                <div class="footer-info">
                    <div class="footer-images-help">
                        <div class="footer-images">
                            <img src="svg_img/icons8-18-plus-50.png" alt="18+" width="44px" height="44px" id="18plus"/>
                            <img src="site_img/Gamble_Aware_White.png" alt="gambleAware" height="40px" width="120px" id="gambleAware"  onclick="window.open('https://www.gambleaware.org/', '_blank')" >
                            <img src="site_img/care.png" alt="Gamcare" height="40px" width="100px" id="gamcare" onclick="window.open('https://www.gamcare.org.uk/', '_blank')" >
                            <img src="site_img/dmca-badge-w250-2x1-03.png" alt="" width="90px" height="44px">
                        </div>
                        <p class="footer-help-text">Kérj szerencsejáték segítséget itt</p>
                        <div class="footer-help-contact">
                            <div class="footer-contact">
                                <img src="svg_img/icons8-phone-50.png" alt="Telefon" width="20px" height="20px">
                                <div class="contact-info">
                                    <span>36 1 299 40</span>
                                </div>
                            </div>
                            <p class="addiction-warning">A szerencsejáték addiktív lehet. Játssz felelősséggel!</p>
                        </div>
                    </div>
                    <div class="footer-description-follow">
                        <p class="footer-description">
                            Az online kaszinók izgalmas és szórakoztató élményt nyújtanak, de mindig játssz felelősségteljesen! A casinoarena.hu oldalon található linkek egy része partneri megállapodások része, ami azt jelenti, hogy jutalékot kapunk, ha regisztrálsz és befizetsz rajtuk keresztül. Ez nem befolyásolja a bónuszokat vagy promóciókat, amelyeket igénybe vehetsz.
                        </p>
                        <div class="footer-follow">
                            <p id="footer_follow_p">Kövess minket:</p>
                            <p id="footer_follow_i"><i class="fa fa-twitch" onclick="window.open('https://www.twitch.tv/zolyy__', '_blank')"></i></p>
                        </div>
                    </div>
                    <div class="footer-legal">
                        <a href="casinoarena/feltetel.html"> Cookie tájékoztató</a> | 
                        <a href="casinoarena/altalanos_szerzodes.html"> Általános szerződési feltételek</a> | 
                        <span>Copyright © 2025 casinoarena.hu | Minden jog fenntartva</span>
                    </div>
                    
                </div>
            </div>
        </footer>
        -->
        
        
 <!-- jQuery (csak egyszer) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js (szükséges a Bootstrap 4 dropdown és navbar működéséhez) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JS (csak egyszer) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

<!-- Saját JavaScript fájlok -->
<script src="./js/wishlish_manager.js"></script>
<script src="./js/cart.js"></script>
<script src="./js/whislist.js"></script>
<script src="./js/index.js"></script>



</body>
</html>
