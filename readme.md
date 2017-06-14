<p align="center">
<img src="https://scrutinizer-ci.com/g/manuelblanch/inventory_test/badges/quality-score.png?b=master" alt="Scrutinizer"></a>
<a href="https://styleci.io/repos/74695706"><img src="https://styleci.io/repos/74695706/shield?branch=master" alt="StyleCI"></a>
<a href="https://travis-ci.org/manuelblanch/inventory_test"><img src="https://travis-ci.org/manuelblanch/inventory_test.svg?branch=master" alt="Build Status"></a>


</p>

Acces a la web de presentació https://manuelblanch.github.io/presentation_inventory

## Aplicació Inventari

Inventari es una aplicació framework que serveix per a poder inventariar objectes i introduirlos en una base de dades, aquests objectes es podran administrar i es podran utilitzar per poder realitzar accions tals com poder exportar a pdf o format excel els items de la base de dades.

## Instal·lació de l'aplicació per poder ferla servir en local

En una carpeta procedim a clonar el repositori

```git clone https://github.com/manuelblanch/inventory_test
```

-Accedir per terminal i realitzar un composer update desde la carpeta inventory_test, s’instal·laran tots els elements que estan inclosos en el composer.json la carpeta vendor, aquesta carpeta conte tot el programari necessari per a que l'alicació funcioni.

-Crear la base de dades inventory mitjançant algun administrador de bases de dades (phpmyadmin).

-Accedim per terminal a la carpeta inventory_test, en aquesta carpeta esta tot els arxius necessaris de l'aplicació per al correcte funcionament.

-## Taula de continguts

- [Instal·lació/Actualització](#instal·lació-o-actualitzacio)
- [Setup](#setup)
- [Llicencia](#llicencia)
- [Enllaços](#enllaços)


## Installation or update

Accedir per terminal i realitzar un composer update desde la carpeta inventory_test, s’instal·laran tots els elements a la carpeta vendor.

```
composer create-project --prefer-dist laravel/laravel myshop
```

`composer update`


```

In the last step you must now execute these artisan commands to get a working
or updated Aimeos installation:

```
php artisan migrate

```

## Setup


## License

The Inventory Adminlte package is licensed under the terms of the MIT license and
is available for free.

## Links

* [Api](https://manuelblanch.github.io/inventoryApiDocs/)
* [Composer packages](https://packagist.org/packages/mblanch/inventory)
* [Source code](https://github.com/manuelblanch/inventory_test)
