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
        <h1 class="mb-4">Cookie (süti) tájékoztató</h1>

        <p>
            A Bookshop.hu weboldala cookie-kat („sütiket”) használ a felhasználói élmény javítása, a forgalom elemzése,
            valamint marketing és statisztikai célokból. A sütik kis szöveges fájlok, amelyeket a weboldal helyez el
            az Ön számítógépén vagy mobileszközén.
        </p>

        <h3>Milyen típusú cookie-kat használunk?</h3>
        <ul>
            <li><strong>Munkamenet (session) cookie-k:</strong> Ezek ideiglenesek, a böngésző bezárásával automatikusan törlődnek.</li>
            <li><strong>Állandó (persistent) cookie-k:</strong> Ezek hosszabb ideig tárolódnak az Ön eszközén, vagy amíg manuálisan nem törli őket.</li>
            <li><strong>Analitikai és marketing célú cookie-k:</strong> Segítenek a weboldal forgalmának elemzésében, valamint hirdetések testreszabásában.</li>
        </ul>

        <h3>A cookie-k használatának jogalapja</h3>
        <p>
            A működéshez feltétlenül szükséges cookie-k jogalapja az adatkezelő jogos érdeke (GDPR 6. cikk (1) bekezdés f) pont),
            míg a statisztikai és marketing célú cookie-k használatához az Ön hozzájárulása szükséges (GDPR 6. cikk (1) bekezdés a) pont).
        </p>

        <h3>Hogyan kezelheti a cookie-kat?</h3>
        <p>
            Böngészője beállításaiban bármikor letilthatja vagy törölheti a cookie-kat. Felhívjuk figyelmét, hogy a cookie-k tiltása
            esetén előfordulhat, hogy a weboldal bizonyos funkciói nem működnek megfelelően.
        </p>

        <h3>Az Ön jogai</h3>
        <p>Ön jogosult:</p>
        <ul>
            <li>hozzáférni a személyes adataihoz,</li>
            <li>kérni azok helyesbítését vagy törlését,</li>
            <li>tiltakozni az adatkezelés ellen,</li>
            <li>panaszt tenni a Nemzeti Adatvédelmi és Információszabadság Hatóságnál (NAIH).</li>
        </ul>

        <div class="alert alert-info mt-4">
            További információkat az <a href="adatvedelem.php">Adatvédelmi tájékoztatóban</a> talál.
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
                <a href="#">Cookie tájékoztató</a>
            </p>
        </div>
    </footer>

</body>
</html>
