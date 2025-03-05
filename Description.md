# connect.php

Ebben a fájlban kerül definiálásra a `DatabaseConnection` osztály, amely tartalmazza az adatbázis-kapcsolathoz szükséges paramétereket, mint a **host**, **felhasználó** (*mivel localhost ezért root*), **jelszó** (*szintén mivel localhost ezért nincs*) és **adatbázis név**. 

A konstruktorban kerül meghívásra a **connect** metódus, amely létrehozza az adatbázis-kapcsolatot, és kezeli a kapcsolódás közben felmerülő hibákat. A hibaüzenetek, exception formában jelennek meg, ahol tudtunk van magyar hibajelzés.

A **getConnection** metódus visszaadja az adatbázis-kapcsolatot (conn), amelyet a webshop működéséhez használunk.

---

# login.php

Session elindításával kezdődik, azután be van include-olva a connect.php

Auth class, mint "autentikáció", konstruktorba kerül meghívásra a **connect** függvényt (*ezt kb. mindenhol meg kell majd hivni, mármint minden file-ba, ahol használni kell db connectet*)

A **login** függvénybe, a felhasználót email, és jelszó egyezése alapján keresi, majd csinál egy tokent, ezzel lehet a továbbiakban a felhasználót azonosítani. Ha a kijelentkezik, vagy lejár a token *élettartama*, akkor a token törlésre kerül! Ha a felhasználó bepipálta az *Emlékezz rám* checkbox-ot, akkor Cookie-ban el lesz tárolva a token, ezt egy ráfrissítéssel lehet ellenőrizni



Kijelentkezésnél ugye törlődik a token, és főoldalra visszadobja a felhasználót, session unset, illetve destroyed lesz alapvetően.

**getUserByEmail** metódus megkeresi a felhasználót email alapján.
**getOrCreateToken** token-t csinálja meg, illetve hozzárendeli a bejelentkezett felhasználóhoz
**generateNewTokem** ha nincs még meglévő token generál egyet
**getExistingToken** itt a tokenes táblából kiszedi a tokent és a felhasználóhoz rendeli, 1 token - 1 felhasználó

Tokenekről, bin2hex-es generálás, 32 byte ami 64 karakter, ez a hosszára érvényes persze
Alapvető lejárata 30 napra van állítva, ez bármikor változtatható, igényre szabható

**setSession** a session-t csinálja meg, email, illetve name megkapja a firstname-et pl. Zoltán, amit majd a bejelentkezett felhasználó jobb felül lát, amikor be van jelentkezve (*Bejelentkezés/Regisztráció nem lesz látható, hanem helyére a felhasználó neve kerül*)

**setCookies** alapvetően a token kerül belle, illetve a session id, a vizsgálatba a token nem látható, hanem a session-ön belül kell keresni, és ott látható

**logout**

Logout mégbővebben: kijelentkezésnél, a session-t destroyolni kell, ha valami hiba van ezzel, akkor lesz hibajelzés, try-catch blokkok használata, a **cookie** is törlésre kerül, a *deleteCookie* metódusban, itt is egy hibakezelés ha nem lehet törölni, ezek a hibajelzéseknek fejlesztésnél vagy valami nagyobb hibánál lehet potenciális segítség az értelmezésben, ezáltal időt lehet megspórolni. URL redirect, vissza a főoldalra

Ezek egy try-ban vannak pontosítva, meghívva, itt is a hiba kiszűrése a cél

# register.php

**validateName** itt a néve lesz validálva, hogy ugye miket tartalmazhat, ez preg_matchel van megvalósítva, nyílván speciális karakterek nem lehetnek, számok se benne stb. ezeket kell kiszűrni
**formatPhoneNumber** itt a telefonszám megformázása a cél, ha pl. a felhasználó 0630-at ad meg a database-be ez +36(30)- lesz írva
Jelenleg csak magyar telefonszámok az elfogadottak, de később a nemzeti piacra való betöréskor ez itt átprogramozható nagyon egyszerűen. Egyébként a +3630 vagy +36(30) formátum is elfogadott!
**validatePassword** itt ugye a jelszó validálása történik, a követelmények alapján, 8karakter hosszúnak kell legyen minimum, legalább 1 szám meg 1 spec. karakter
**isEmailRegistered** megnézi, hogy regisztrálva van-e az email, ha igen, akkor hiba üzenetet dob, ha nem akkor DB-be menti regisztrációnál
**isPhoneNumberRegistered** telefonszámot nézi meg hogy regisztrálva van-e már, mint az emailnel 
**validateRegistration** itt az eddigi függvények alapján validál mindent egyszerre, ha van hiba akkor az *errors[]* tömbbe gyűjti és majd a bejelentkezési lapon visszaadja a felhasználónak
**registerUser** itt a validált adatokat írja bele az adatbázisba, csak akkor ha sikeres a regisztráció (nyílván)

Kitöltetlenül nem maradhat semmi, tehát minden mező kitöltése kötelező, de addig nem tudja beküldeni mert az ürres reqired-be van, de az a html-be ugye

A végén meg kiírja az *errors[]* tömbből a hibákat a felhasználónak, ha van persze, ha nincs, akkor sikeres regisztráció

Sikeres regisztráció esetén a **login** oldalra vezényel, ahol megjelenik zölddel egy Sikeres regisztráció-s szöveg, ezután be kell jelentkezni!

# check_token.php

**authenticate** függvénybe a cookie-ba kerül a token, amely a felhasználót a továbbiakban azonosítjuk, a tokent nyílván validáljuk, illetve UserSessiont is elindítjuk.
