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

</head>

<body>

    <!-- Header csak logóval és visszalépési lehetőséggel -->
    <header class="bg-light py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="index.php">
                <img src="img/logo.png" alt="Bookshop logo" height="40px">
            </a>
            <a href="index.php" class="btn btn-outline-secondary">Vissza a főoldalra</a>
        </div>
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

    <!-- Footer (egyszerűsített) -->
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
