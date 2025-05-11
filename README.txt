Könyv Webáruház – Projekt README
================================

⚠️ FONTOS INFORMÁCIÓK!

1. PROJEKTKÖRNYEZET BEÁLLÍTÁSA
------------------------------
A projekt környezetének helyes felállítását kérjük, végezze el a Felhasználói dokumentáció szerint.
Részletes útmutatást képekkel illusztrálva a következő pontban talál:
"A webshop környezetünk felállítása".

2. TESZTELÉS
------------
A rendszer teszteléséhez kérjük, telepítse a kódban kikommentelt csomagokat és függőségeket.
Ezek szükségesek a tesztek futtatásához.

3. TESZTFELHASZNÁLÓK
--------------------
A teszteléshez szükséges felhasználói fiókokat megtalálja a "TestUsers.txt" fájlban.
FIGYELEM: ezek a fiókok nem tartalmaznak valós email címeket!

Jelszó frissítése:
- Ha szeretné kipróbálni a jelszófrissítés funkciót, kérjük, adjon meg egy működő email címet.
- Ha nem kapja meg az emailt, ellenőrizze:
  - az "Összes levél" mappát
  - valamint a "Spam" mappát is

4. APACHE KONFIGURÁCIÓ
-----------------------
Mellékeltünk egy példát a "httpd.conf" fájlra, melynek végén szerepel egy felhasználó konfiguráció is.
Ez csak segítségként szolgál – nem javasolt ennek közvetlen használata.
A felhasználói adatokat minden esetben módosítani kell!

5. ADATBÁZIS
------------
Hozza létre az adatbázist:

CREATE DATABASE konyvwebaruhaz
CHARACTER SET utf8
COLLATE utf8_hungarian_ci;

Importálja be minden esetben a mellékelt "konyvwebaruhaz.sql" fájlt!

Admin jog beállítása:
- A "users" táblában az adott felhasználó "isAdmin" mezőjét állítsa 0 helyett 1 értékre.

---------------------------------
Köszönjük, hogy betartja az útmutatásban leírtakat!


