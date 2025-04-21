<?php
include '../src/check_token.php';
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adatvédelmi Tájékoztató | Bookshop</title>

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

    <main class="container my-5">
        <h1 class="mb-4">Adatvédelmi Tájékoztató</h1>

        <p>
            A Bookshop.hu tiszteletben tartja az Ön személyes adatai védelmét. Az alábbiakban tájékoztatjuk, hogyan kezeljük
            az Ön személyes adatait, amikor a weboldalunkat használja, és miért fontos az adatkezelés számunkra.
        </p>

        <h3>1. Az adatkezelő</h3>
        <p>
            Az adatkezelő a Bookshop.hu, amely a személyes adatokat a jogszabályoknak megfelelően kezeli és védi.
        </p>

        <h3>2. Milyen személyes adatokat gyűjtünk?</h3>
        <p>
            A következő személyes adatokat gyűjthetjük, amikor Ön regisztrál, rendelést ad le, vagy kapcsolatba lép velünk:
        </p>
        <ul>
            <li>Vezetéknév és keresztnev</li>
            <li>Szállítási cím</li>
            <li>Email cím</li>
            <li>Telefonszám</li>
            <li>Bankkártya információ (a fizetéshez)</li>
            <li>IP cím és böngésző adatok (a weboldal használat során)</li>
        </ul>

        <h3>3. Miért gyűjtjük az adatokat?</h3>
        <p>
            Az Ön személyes adatait az alábbi célokra használjuk:
        </p>
        <ul>
            <li>Megrendelések feldolgozása és teljesítése</li>
            <li>Ügyfélszolgálati támogatás nyújtása</li>
            <li>Számlázás és fizetési tranzakciók kezelése</li>
            <li>Marketing és promóciós célú tájékoztatás (csak az Ön hozzájárulása esetén)</li>
            <li>Weboldal fejlesztése és a felhasználói élmény javítása</li>
        </ul>

        <h3>4. Az adatkezelés jogalapja</h3>
        <p>
            Az Ön személyes adatait a következő jogalapok alapján kezeljük:
        </p>
        <ul>
            <li><strong>Szerződés teljesítése:</strong> Az Ön rendelésének feldolgozása és teljesítése érdekében szükséges adatok kezelése.</li>
            <li><strong>Hozzájárulás:</strong> Marketing célú adatkezelés csak az Ön előzetes hozzájárulásával történik.</li>
            <li><strong>Jogi kötelezettség:</strong> Az adó- és számviteli törvényeknek megfelelően a számlázáshoz szükséges adatok kezelése.</li>
            <li><strong>Jogos érdek:</strong> A weboldal működésének javítása és a felhasználói élmény növelése érdekében végzett adatkezelés.</li>
        </ul>

        <h3>5. Hogyan védjük az Ön adatait?</h3>
        <p>
            Minden tőlünk telhetőt megteszünk annak érdekében, hogy az Ön személyes adatai biztonságban legyenek. Az adatokat
            titkosított kapcsolatokon keresztül tároljuk, és azokat csak az arra jogosult munkatársak férhetnek hozzá.
        </p>

        <h3>6. Hogyan kezelheti az Ön adatvédelmi jogait?</h3>
        <p>
            Ön jogosult arra, hogy hozzáférjen, módosítson, töröljön, vagy korlátozza a személyes adatainak kezelését. Ezen kívül
            jogában áll visszavonni a hozzájárulását bármely adatkezeléshez, amennyiben az adatkezelés hozzájárulás alapú.
        </p>
        <ul>
            <li>Hozzáférés joga</li>
            <li>Helyesbítés joga</li>
            <li>Törlés joga (elfeledtetés)</li>
            <li>Adatkezelés korlátozásának joga</li>
            <li>Adathordozhatóság joga</li>
            <li>Hozzájárulás visszavonásának joga</li>
        </ul>

        <h3>7. Az Ön jogai érvényesítése</h3>
        <p>
            Ha szeretné gyakorolni bármelyik jogát, kérjük, vegye fel velünk a kapcsolatot az <a href="mailto:support@bookshop.hu">support@bookshop.hu</a> email címen.
        </p>

        <h3>8. Az adatok megosztása harmadik féllel</h3>
        <p>
            Az Ön személyes adatait harmadik féllel kizárólag az alábbiak szerint osztjuk meg:
        </p>
        <ul>
            <li>Szállítók és futárszolgálatok a termékek kézbesítése érdekében</li>
            <li>Pénzügyi intézmények a bankkártyás tranzakciók lebonyolításához</li>
            <li>Adóhatóságok és egyéb jogi hatóságok, amennyiben az jogi kötelezettségünk.</li>
        </ul>

        <h3>9. Milyen jogi lehetőségek állnak rendelkezésre?</h3>
        <p>
            Ha úgy érzi, hogy jogai sérültek, vagy bármilyen adatvédelmi problémát tapasztal, panaszt tehet a <strong>Nemzeti Adatvédelmi és Információszabadság Hatóságnál (NAIH)</strong>.
        </p>

        <h3>10. Módosítások</h3>
        <p>
            Fenntartjuk a jogot, hogy bármikor módosítsuk adatvédelmi irányelveinket, amennyiben a jogszabályok, az üzleti környezet
            vagy a szolgáltatásaink megváltoznak. A módosításokat ezen az oldalon fogjuk közzétenni.
        </p>

        <div class="alert alert-info mt-4">
            További információkat az <a href="aszf.php">Általános Szerződési Feltételekben</a> talál.
        </div>

        <button class="btn btn-primary mt-3" onclick="window.history.back();">Vissza</button>
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
