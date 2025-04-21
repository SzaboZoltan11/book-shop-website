<?php
include '../src/check_token.php';
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie tájékoztató | Bookshop</title>

    <link rel="stylesheet" href="./css/cookie.css">
    <link rel="stylesheet" href="./css/index.css">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <!-- Additional CSS -->
    <link rel="stylesheet" href="./css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Oxanium' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


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

               
            <?php endif; ?>

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
                <a href="checkout.php"><button id="checkout-btn" class="checkout-btn" style="display: none;">Tovább a fizetéshez</button></a>
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
                                <a class="dropdown-item" href="">Szépirodalmi</a>
                                <a class="dropdown-item" href="">Ismeretterjesztő</a>
                                <a class="dropdown-item" href="">Gyerekeknek</a>
                                <a class="dropdown-item" href="">Angol könyvek</a>
                                <a class="dropdown-item" href="">Ifjúsági</a>
                                <a class="dropdown-item" href="">Különleges ajánlat</a>
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

    <main class="container">
    <h1 class="mb-4">Cookie (süti) tájékoztató</h1>

    <p>
        A Bookshop.hu weboldala cookie-kat („sütiket”) használ a felhasználói élmény javítása, a forgalom elemzése,
        valamint marketing és statisztikai célokból.
    </p>

    <h3>Milyen típusú cookie-kat használunk?</h3>
    <ul>
        <li><strong>Munkamenet (session) cookie-k:</strong> Ezek ideiglenesek, a böngésző bezárásával automatikusan törlődnek.</li>
        <li><strong>Állandó (persistent) cookie-k:</strong> Ezek hosszabb ideig tárolódnak az Ön eszközén.</li>
        <li><strong>Analitikai és marketing célú cookie-k:</strong> Segítenek a forgalom elemzésében és hirdetések testreszabásában.</li>
    </ul>

    <h3>A cookie-k használatának jogalapja</h3>
    <p>
        A működéshez feltétlenül szükséges cookie-k jogalapja az adatkezelő jogos érdeke, míg a marketing célú cookie-khoz az Ön hozzájárulása szükséges.
    </p>

    <h3>Hogyan kezelheti a cookie-kat?</h3>
    <p>
        A böngésző beállításaiban bármikor letilthatja vagy törölheti a cookie-kat. Ez azonban bizonyos funkciók működését befolyásolhatja.
    </p>
    <h3>Az Ön jogai</h3>
    <ul>
        <li><strong>Hozzáférés joga:</strong> Ön jogosult tájékoztatást kapni a kezelt személyes adatairól.</li>
        <li><strong>Helyesbítés joga:</strong> Kérheti a pontatlan adatok helyesbítését.</li>
        <li><strong>Törlés joga („az elfeledtetéshez való jog”):</strong> Kérheti adatainak törlését bizonyos feltételek mellett.</li>
        <li><strong>Adatkezelés korlátozásának joga:</strong> Bizonyos esetekben kérheti az adatkezelés korlátozását.</li>
        <li><strong>Adathordozhatósághoz való jog:</strong> Kérheti adatai kiadását vagy továbbítását más szolgáltatóhoz.</li>
        <li><strong>Tiltakozás joga:</strong> Tiltakozhat személyes adatainak kezelése ellen.</li>
        <li><strong>Panasztétel joga:</strong> Panaszt nyújthat be a Nemzeti Adatvédelmi és Információszabadság Hatóságnál (NAIH).</li>
    </ul>




    <!-- Adatvédelmi tájékoztató gomb-stílusban -->
    <div class="info-box mt-4">
        📄 További információkat az 
        <a href="adatvedelem.php" class="btn-link">Adatvédelmi tájékoztatóban</a> talál.
    </div>

    <!-- Jobbra igazított vissza gomb -->
    <div class="button-container">
        <button class="btn" onclick="window.history.back();">Vissza</button>
    </div>
</main>


 <!-- Footer-->
 <footer>
        <div class="footer-links">
            <div class="footer-info">
                <div class="footer-images-help">
                    <!-- Footer Ikons-->
                    <div class="footer-images">
                        <i class="fa fa-book"></i>
                        <i class="fa fa-truck"></i>
                        <i class="fa fa-credit-card"></i>
                        <i class="fa fa-lock"></i>
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
                        <i class="fab fa-facebook"></i>
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


    <script src="./js/decorate.js"></script>

</body>
</html>
