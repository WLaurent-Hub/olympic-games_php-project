# Olympic games PHP project

## Presentation 

This first PHP project is a **mapping portal** with different filters based on SQL queries.

This website simulates an order from the French Ministry of Culture, wishing to set up a **web solution that maps cultural data (hotels and businesses)** from communes in the Ile-de-France region for the 2024 Olympic Games. This tool will make it possible to communicate which **communes are most affected by leisure centers**.

A login and registration section has been introduced to provide new features for data filtering. Once logged in, you can **write your personal SQL queries** (if valid).

The header is used to navigate between the tabs:
- **Search**: Displays the map portal (home page)
- **View**: Displays the project subject
- **About**: Displays lorem ipsum
- **Login**: Displays user registration and login

## Data 

Data are geospatial files in `shapefile format`:

<pre>
📦olympic-games_php-project
 ┣ 📂data
 ┃ ┣ 📜les_commerces_par_commune_ou_arrondissement_base_permanente_des_equipements.shp
 ┃ ┣ 📜les_hotels_classes_en_ile_de_france.shp
 ┃ ┗ 📜les_salles_de_cinemas_en_ile_de_france.shp
</pre>

- les-commerces-par-commune-ou-arrondissement-base-permanente-des-equipements.shp : <br>
representing the shops by commune of Ile-de-France
- les_hotels_classes_en_ile-de-france.shp : representing the hotels of Ile-de-France
- les_salles_de_cinemas_en_ile-de-france.shp : representing the cinemas of Ile-de-France

## Run locally

1. Clone the project :
    - git clone https://github.com/WLaurent-Hub/olympic-games_php-project.git

2. Move this cloned folder to WampServer `(without changing the folder name)`

3. Integrating geographic layers on PostGIS in your database `(keep the same file name)`

4. Setup the database in config.php :
<pre>
📦olympic-games_php-project
┣ 📜config.php
</pre>

5. Creating a new table in your database (implement this code in the PSQL Tool) : <br>
*PS: not very correct in terms of safety, needs to be changed for greater safety*
<pre>
    CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
    );
</pre>

6. Launch the project on WampServer's localhost

