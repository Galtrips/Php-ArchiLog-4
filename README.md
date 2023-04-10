# Pokemon Website

This project is a pokemon card website. It is possible to buy and sell cards

## Subject

I have a large number of Pokémon cards that I would like to catalog, sort, and sell. I need a catalog of all my cards, sorted by power categories with a price for each one (some cards have multiple copies). I need to be able to add cards while logged into the application by entering all the necessary information. A visitor can add cards they're interested in to the shopping cart to purchase. The application doesn't need a sales funnel (registration - credit card payment - sale validation), just a virtual cart that lists the selected cards and the total price.

I am considering a mobile application, so I will need a JSON rendering of the list of Pokémon (you can propose the necessary JSON renderings to allow for maximum mobile functionality).

## Instalation

1. Download [PHP](https://www.php.net/downloads) or update it.

2. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.

3. Clone the project on the server with the next command :
`git clone https://forge.univ-lyon1.fr/p2107616/projetpokemonya.git`.

4. Execute in terminal : `composer install --no-dev`.

5. Install a MariaDB Server on the server or a SQLLite file.

6. If you use a server, Create a database for the project with : `CREATE DATABASE 'name';`

7. Set up the SQL host and password in : `/config/app_local.php`.

8. Start a migration to have tables of the project with : `bin/cake migrations migrate`.

9. Set the debuger to false in : `/config/app_local.php`.

10. Start the server with : `bin/cake server`. 

The project include data test in differents formats. To test the website, you can import the CSV file in your SQL Server or execute the script : `val.sql`. If you have any problem with the migration, you have a script of the database in the file : `tables.sql`.

11. /!\ If you don't want to keep the data test, you need to clear the database and delete all image in : `/webroot/img/cards/`.

12. Enjoy :)

## API Reference

### Get all cards

  get /api/pokemons


### Get a card with an ID

  GET /api/pokemons/${id}


| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| id      | integer | Required. Pokemon cards that have this Id |

### Get all cards with type

  GET /api/pokemons/type/${type}


| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| type      | string | Required. Pokemon cards that have a certain type |

### Get all cards with rarity

  GET /api/pokemons/rarity/${rarity}


| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| rarity      | string | Required.  Pokemon cards that have some rarity  |

### Get all cards recorded in descending price order

  GET /api/pokemons/price 


### Get all cards recorded in descending quantity order

  GET /api/pokemons/quantity 


### Get all cards with id user

  GET /api/pokemons/users/{id}


| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| id      | integer | Required. Pokemon cards that belong to a user |

## Authors

- [@Yohan Lapierre](https://forge.univ-lyon1.fr/p2103678)
- [@Axel Gailliard](https://forge.univ-lyon1.fr/p2107616)