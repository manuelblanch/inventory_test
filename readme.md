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

```
git clone https://github.com/manuelblanch/inventory_test
```

Accedir per terminal i realitzar un composer install desde la carpeta inventory_test, s’instal·laran tots els elements que estan inclosos en el composer.json i es creara la carpeta vendor, aquesta carpeta conte tot el programari necessari per a que l'alicació funcioni.

```
composer update
```

Crear la base de dades inventory mitjançant algun administrador de bases de dades (phpmyadmin).

Accedim per terminal a la carpeta inventory_test, en aquesta carpeta esta tot els arxius necessaris de l'aplicació per al correcte funcionament.

## Setup

Accedir per terminal i realitzar un php artisan key:generate.

```
php artisan key:generate
```

```
Application key [xxxxxxx] set successfully.
```
Haurem de configurar el fitxer .env, pero abans copiem el fitxer .env.example i el renombrem a .env

```
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelu
DB_USERNAME=root
DB_PASSWORD=''
```
Introduirem les nostres dades de configuració.

```
php artisan migrate
```

```
Migrating: 2017_05_24_161721_create_inventory_object_table
Migrated:  2017_05_24_161721_create_inventory_object_table
Migrating: 2017_05_24_162051_create_brand_type_table
Migrated:  2017_05_24_162051_create_brand_type_table
Migrating: 2017_05_24_162058_create_brand_model_table
Migrated:  2017_05_24_162058_create_brand_model_table
Migrating: 2017_05_24_163656_create_material_type_table
Migrated:  2017_05_24_163656_create_material_type_table
Migrating: 2017_05_24_201201_create_properties_table
Migrated:  2017_05_24_201201_create_properties_table
Migrating: 2017_05_27_125740_create_blog_table
Migrated:  2017_05_27_125740_create_blog_table
```
Ja tenim realitzades les migracions i amb això ja s'han creat les taules.

```
llum serve
```
Ja podem iniciar l'aplicació i registrarnos.

## License

The Inventory Adminlte package is licensed under the terms of the MIT license and
is available for free.

## Links

* [Api](https://manuelblanch.github.io/inventoryApiDocs/)
* [Composer packages](https://packagist.org/packages/mblanch/inventory)
* [Source code](https://github.com/manuelblanch/inventory_test)
