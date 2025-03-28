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
    <meta name="keywords"
        content="Online bookstore, Book purchase, New books, Best books, Special editions, E-books, Discounted books, Book recommendations, Reading, Literature, Adult books, Children's books, Classic books, Most popular books, Online book shopping, Textbooks, Bookstore promotions, Bookstore offers">
    <meta name="description"
        content="Discover the best online bookstore where you can find a wide selection of books in various genres, including the latest releases, bestsellers, classics, and special editions. Our platform offers detailed and honest reviews of books, as well as updated information on discounts, special offers, and promotions. Whether you're looking for fiction, non-fiction, children's books, or textbooks, we have something for everyone. Enjoy a seamless shopping experience with secure payments and fast delivery options. Start exploring our collection today and find your next great read at the best prices. Join now and enjoy reading like never before!">
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
    <meta property="og:title" content="Best Online Bookstore for Book Lovers in 2025">
    <meta property="og:description"
        content="Explore the best online bookstore for a wide selection of books, from bestsellers to rare editions. Stay updated with the latest book releases, offers, and recommendations. Join the community of readers today!">
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
    <meta property="og:description"
        content="Explore the best online bookstore for a wide selection of books, from bestsellers to rare editions. Stay updated with the latest book releases, offers, and recommendations. Join the community of readers today!">
    <meta name="twitter:image" content="">
    <meta name="twitter:creator" content="">
    <meta name="twitter:domain" content="">
    <meta name="twitter:label1" content="Bookshop Project">
    <meta name="twitter:data1" content="">

    <!-- For better loading time -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
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
                    <input class="form-control" type="search" placeholder="Keresés" aria-label="Search" width="100%"
                        id="searchInput">
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

                    <!-- Whislist ikon -->
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

        <!-- MODAL -->
        <div id="bookResultsBackdrop"></div>

        <!-- Results -->
        <div id="bookResults">

        </div>


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
                                <a class="dropdown-item" href="p">Szépirodalmi</a>
                                <a class="dropdown-item" href="">Ismeretterjesztő</a>
                                <a class="dropdown-item" href="">Gyerekeknek</a>
                                <a class="dropdown-item" href="">Angol könyvek</a>
                                <a class="dropdown-item" href="">Ifjúsági</a>
                                <a class="dropdown-item" href="">Különleges ajánlat</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="info/szepirodalom_frontend.php">Szépirodalmi</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Ismeretterjesztő</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Gyerekeknek</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Angol könyvek</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Ifjúsági</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php" id="booksDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Különleges ajánlat
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
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5"></main>

    <footer>
        <div class="footer-links">
            <div class="footer-info">
                <div class="footer-images-help">
                    <div class="footer-images">
                        <i class="fa fa-book" style="font-size: 44px;"></i>
                        <i class="fa fa-truck" style="font-size: 40px;"></i>
                        <i class="fa fa-credit-card" style="font-size: 40px;"></i>
                        <i class="fa fa-lock" style="font-size: 44px;"></i>
                    </div>
                    <p class="footer-help-text">Vásárolj könyveket nálunk!</p>
                    <div class="footer-help-contact">
                        <div class="footer-contact">
                            <i class="fa fa-phone" style="font-size: 20px;"></i>
                            <div class="contact-info">
                                <span>36 2 129 66</span>
                            </div>
                        </div>
                        <p class="addiction-warning">Könyveink ára tartalmazza az ÁFÁ-t!</p>
                    </div>
                </div>
                <div class="footer-description-follow">
                    <p class="footer-description">
                        Merülj el a könyvek lenyűgöző világában, és találd meg a tökéletes olvasmányt a Bookshop.hu
                        kínálatában! Akár a legújabb bestsellerekre, akár az örök klasszikusokra vágysz, nálunk mindent
                        megtalálsz, hogy felfedezd a tudás, kaland és fantázia határtalan világát. Vásárolj most, és
                        élvezd a könyvek varázslatos világát, ahol minden egyes oldal új élményt kínál!
                    </p>
                    <div class="footer-follow">
                        <p id="footer_follow_p">Kövess minket:</p>
                        <p id="footer_follow_i">
                            <i class="fa fa-facebook"></i>
                        </p>
                    </div>
                </div>
                <div class="footer-legal">
                    <a href="#"> Cookie tájékoztató</a> |
                    <a href="#"> Általános szerződési feltételek</a> |
                    <span>Copyright © 2025 bookshop.hu | Minden jog fenntartva</span>
                </div>
            </div>
        </div>
    </footer>


    <div id="decoration"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

    <script src="./js/wishlish_manager.js"></script>
    <script src="./js/cart.js"></script>
    <script src="./js/whislist.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/decorate.js"></script>
    <script src="./js/searchbar.js"></script>



</body>

</html>