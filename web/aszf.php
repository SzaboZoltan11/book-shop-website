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

</head>

<body>

    <header class="bg-light py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="index.php">
                <img src="img/logo.png" alt="Bookshop logo" height="40px">
            </a>
            <a href="index.php" class="btn btn-outline-secondary">Vissza a főoldalra</a>
        </div>
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

        <div class="alert alert-info mt-4">
            További információkat az <a href="cookie.php">Cookie tájékoztatóban</a> talál.
        </div>

        <button class="btn btn-primary mt-3" onclick="window.history.back();">Vissza</button>
    </main>

    <footer class="bg-light text-center py-4">
        <div class="container">
            <p class="mb-1">© 2025 Bookshop.hu | Minden jog fenntartva.</p>
            <p>
                <a href="aszf.php">ÁSZF</a> |
                <a href="adatvedelem.php">Adatvédelem</a> |
                <a href="cookie.php">Cookie tájékoztató</a>
            </p>
        </div>
    </footer>

</body>
</html>
