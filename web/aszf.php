<?php
include '../src/check_token.php';
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Általános Szerződési Feltételek | Bookshop</title>

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
            <div>
                <a href="logination.php" class="mr-3" id="nav-hover">Bejelentkezés</a>
                <a href="registration.php" id="nav-hover">Regisztráció</a>
            </div>
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
                                <a class="dropdown-item" href="index.php">Összes Könyv</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <h1 class="mb-4">Általános Szerződési Feltételek</h1>

        <p>
            A Bookshop.hu webáruház által kínált szolgáltatások igénybevételével Ön elfogadja az alábbi Általános Szerződési Feltételekben (ÁSZF) foglaltakat.
            Kérjük, figyelmesen olvassa el az alábbiakat, mivel ezek a weboldal használatával kapcsolatos jogait és kötelezettségeit tartalmazzák.
        </p>

        <h3>1. Általános rendelkezések</h3>
        <p>
            A Bookshop.hu (a továbbiakban: Szolgáltató) webáruházat működtet a Bookshop.hu domain név alatt. A webáruház használatával
            a felhasználó (a továbbiakban: Vásárló) elfogadja az Általános Szerződési Feltételeket.
        </p>

        <h3>2. Szerződéskötés</h3>
        <p>
            A webáruházban történő vásárlás a Vásárló és a Szolgáltató közötti elektronikus szerződéskötést jelent. A Vásárló a termékek
            kiválasztásával és a rendelés véglegesítésével ajánlatot tesz a Szolgáltató számára, melyet a Szolgáltató az ajánlat
            visszaigazolásával fogad el.
        </p>

        <h3>3. Termékek és szolgáltatások</h3>
        <p>
            A webáruházban található termékek, azok leírása, ára és elérhetősége folyamatosan változhatnak. A Szolgáltató nem garantálja
            a termékek folyamatos elérhetőségét, és fenntartja a jogot a termékek megváltoztatására vagy visszavonására.
        </p>

        <h3>4. Vásárlás menete</h3>
        <p>
            A vásárlás során a Vásárlónak regisztrációs folyamaton kell átesnie, mely során személyes adatokat kell megadnia. A
            rendelés véglegesítése előtt a Vásárló ellenőrizheti a megadott adatokat és a rendelés összegét.
        </p>

        <h3>5. Fizetés</h3>
        <p>
            A Vásárló a rendelés véglegesítése után különböző fizetési módok közül választhat (pl. bankkártyás fizetés, utánvét).
            A vásárlás során feltüntetett árak minden esetben bruttó árak, tartalmazzák az áfát, de a szállítási díjat nem.
        </p>

        <h3>6. Szállítás</h3>
        <p>
            A Szolgáltató a megrendeléseket a Vásárló által választott szállítási mód szerint teljesíti. A szállítási költség
            a rendelés véglegesítése előtt kerül feltüntetésre. A szállítási idő a termékek típusától és a szállítási címtől függően
            változhat.
        </p>

        <h3>7. Elállás joga</h3>
        <p>
            A Vásárló a termék átvételétől számított 14 napon belül indoklás nélkül elállhat a szerződéstől, és visszaküldheti
            a terméket. Az elállás joga a vásárlás teljes összegére vonatkozik, beleértve a szállítási költséget is.
        </p>

        <h3>8. Jótállás és szavatosság</h3>
        <p>
            A Szolgáltató a termékekre vonatkozó jótállást és szavatosságot biztosít a jogszabályi előírásoknak megfelelően.
            A jótállás és szavatosság részleteit a termékek mellékelése tartalmazza.
        </p>

        <h3>9. Adatkezelés</h3>
        <p>
            A Vásárló személyes adatai védelme fontos számunkra. Az adatkezelésről további információk az <a href="adatvedelem.php">Adatvédelmi Tájékoztatóban</a> találhatók.
        </p>

        <h3>10. Jogviták</h3>
        <p>
            A Vásárló és a Szolgáltató között esetlegesen felmerülő jogviták esetén a felek elsődlegesen a békés rendezést
            keresik. Ha a peres eljárás elkerülhetetlen, a jogviták rendezésére a Szolgáltató székhelye szerinti bíróság
            illetékes.
        </p>

        <div class="info-box mt-4">
            További információkat az <a href="cookie.php" class="btn-link">Cookie tájékoztatóban</a> talál.
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
