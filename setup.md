# Setup

## Apache

```
Alias /bookshop/web C:/Users/Zola/Documents/book-shop-website/web
<Directory C:/Users/Zola/Documents/book-shop-website/web>
    Options Indexes FollowSymLinks MultiViews
    Require all granted
    AllowOverride None
    Order allow,deny
    Allow from all
</Directory>

Alias /bookshop/php C:/Users/Zola/Documents/book-shop-website/src
<Directory C:/Users/Zola/Documents/book-shop-website/src>
    Options Indexes FollowSymLinks MultiViews
    Require all granted
    AllowOverride None
    Order allow,deny
    Allow from all
</Directory>
```

Másold át ezt a `C:\xampp\apache\conf\httpd.conf` fájlba.

Írd át az átmásolt szövegben a elérési útvonalakat hogy jók legyenek.

A suliban az óra végén előnyös kiszedni ezt.

## Git

```batch
:: Please don't hack this account and don't steal these informations. (thank you)

git config set SzaboZoltan11 user.name
git config set user.email szabozola91@gmail.com

git config --global user.name "SzaboZoltan11"
git config --global user.email "szabozola91@gmail.com"

```

## Starting

Indíccsd el a xampot

Menj oda hogy http://localhost/bookshop/web/

## Database

:: Hozd létre az adatbázist

CREATE DATABASE konyvwebaruhaz
CHARACTER SET utf8
COLLATE utf8_hungarian_ci;

:: Importáld be a konyvwebaruhaz.sql file-t