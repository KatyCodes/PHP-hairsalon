# Hair Salon

#### _Hair Salon website using MySQL, September 23, 2016_

#### By _**Katy Henning **_

## Description

This is a dynamic site that takes user input and generates lists of clients and organizes them based on their stylists using MySQL. Add a stylist, then a list of clients that correspond. User can click on a stylist and view all of the clients that have that particular stylist, or simply search the stylist. The website also allows users to add clients, update, and delete them(or the entire stylist). The website demonstrates the use of PHP MySQL databases in Silex and Twig (with a one-to-many relationship).

<img src='web/screenshot.png' alt='image of the site'>

## Setup/Installation Requirements

* SQL Commands:
  * mysql.server start
  * mysql -uroot -proot
  * CREATE DATABASE hair_salon;
  * USE hair_salon;
  * CREATE TABLE stylists (id serial PRIMARY KEY, stylistName VARCHAR(255));
  * CREATE TABLE clients (id serial PRIMARY KEY, stylist_id INT, clientName VARCHAR(255));
  * in console :apachectl start
  * web-browser: localhost:8080/phpmyadmin
    	* then from web browser copy the database to a test database by clicking operations
    	* then create hair_salon_test “structure only”

* Clone the repository
* Using the command line, navigate to the project's root directory
* Install dependencies by running $ composer install
* Start MySQL by running the command $ /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot
* Start Apache by running the command $ apachectl start
* Import the MySQL file from localhost:8080/phpmyadmin/
* Navigate to the /web directory and start a local server with $ php -S localhost:8000
* Open a browser and go to the address http://localhost:8000 to view the application

## Known Bugs

There are no known bugs at this time.

## Support and Contact Details

For questions or comments, please contact me through GitHub.

## Technologies Used

* _PHP_
* _Silex_
* _Twig_
* _Bootstrap_
* _MySQL_

### License

*This website is licensed under the MIT license.*  
Copyright (c) 2016 **_Katy Henning**
