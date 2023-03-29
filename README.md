README

This repository contains a PHP script that manages reservations for golf, hotel, and tour services. It uses MySQL as the database.

To use this script, follow these steps:

Set up a MySQL database and configure the connection details in the ./datasource/config.php file.
Import the database schema and sample data from the ./datasource/database.sql file.
Upload the entire repository to a PHP-enabled web server.
Open the index.php file in a web browser to manage reservations.
The index.php file contains the main code for managing reservations. It fetches reservation information from the MySQL database and displays it in a table. The user can search and filter the reservation data based on various criteria.

The script supports three types of reservations: golf, hotel, and tour. Each type of reservation has its own table in the database and its own set of fields.

The script uses the mysqli extension to connect to the MySQL database. It is recommended to use a newer version of PHP that supports this extension.

Note: This script is provided as-is and is not actively maintained. It is intended as an example of PHP and MySQL integration for educational purposes only. Use at your own risk.
