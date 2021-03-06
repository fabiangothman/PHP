# Restaurant API
Hello, this project contains an API built based on Laravel8 to manage the main services in a restaurant. This is a test app so we're going to use it like a small personal windows-computer located app.

## First steps
- We need to setup a local environment to run this app, so to make it faster, let's install the PHP8 XAMPP version.
- Also we need to install Composer in out system.
- So, we're going to use only this services:
    - Composer
    - Apache server (XAMPP8)
    - MySQL (XAMPP8)

## Initialization
- So, we need first to save this repository in any location of our computer (I recommend you to put inside 'Documents')
- Now, let's setup our XAMPP8 to route the app:
    - In our httpd-vhosts.conf (C:\xampp8\apache\conf\extra\httpd-vhosts.conf) let's put the following code at the end of the file:
        - ```bash
            NameVirtualHost *
            <VirtualHost *>
            DocumentRoot "C:\xampp\htdocs"
            ServerName localhost
            </VirtualHost>

            <VirtualHost *>
                DocumentRoot "C:\Users\FABIAN\Documents\Programming\PHP\restaurant_api\public"
                ServerName restaurant-api.test
                <Directory "C:\Users\FABIAN\Documents\Programming\PHP\restaurant_api\public">
                    Options All
                    AllowOverride All
                    Require all granted
                </Directory>
            </VirtualHost>
            ```
        - Please consider to change the routes to your owns 
- With this done, we are ready to open our XAMPP control panel (C:\xampp\xampp-control.exe) and start the Apache and MySQL services.
- Now let's configure the hosts file (C:\Windows\System32\drivers\etc\hosts)
    - Remember to do it with admin rights, add the following line to the end:
        - ```bash
            127.0.0.1	restaurant-api.test
            ```
        - You can add as many domains as you want.
- The next step is to configure our .env in the project's root. So copy the .env.example and create a new file with the name ".env".
- Fill the new .env file with your proper database information, look at the following example:
    - ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=restaurant_api
        DB_USERNAME=root
        DB_PASSWORD=
        ```
    - Please be sure the database exists with the name you configured. You can always access to the database via http://localhost/phpmyadmin to create the database or manage it.
- Now run the script to download the needed Laravel's libraries:
    - Open a terminal or CMD and go to the project's path (In my case C:\Users\FABIAN\Documents\Programming\PHP\restaurant_api) and run the following command:
        - ```bash
            composer install
            ```
    - This is going to create the database model and fill it with demo data.
- Now run the script to fill the database (migrations) like this:
    - Open a terminal or CMD and go to the project's path (In my case C:\Users\FABIAN\Documents\Programming\PHP\restaurant_api) and run the following command:
        - ```bash
            php artisan migrate:fresh --seed
            ```
- Once done, finally type http://restaurant-api.test on your browser to access to the API.

<br />
<br />

## Endpoints
The following is the basic endpoints list for the restaurant API, you can get more details on https://documenter.getpostman.com/view/13736721/UUy39SPJ
- Get order:
    - Method: GET
    - Body: Not required
    - URL: http://restaurant-api.test/orden/{orden_id}
        - Example: http://restaurant-api.test/orden/1
    - Return: Order object required (or error).
- Create order:
    - Method: POST
    - Body:
        - Type: JSON
        - ```javascript
            {
                "name": "Fabian Murillo",
                "order": "Quiero una pasta bolognesa con una cerveza corona.",
                "price": 125000
            }
            ```
        - Fields manatories
    - URL: http://restaurant-api.test/orden
    - Return: Order object created (or error).
- Update order:
    - Method: PUT
    - Body:
        - Type: JSON
        - ```javascript
            {
                "name": "Fabian Murillo",
                "order": "Quiero actualizar a una pasta bolognesa con una cerveza corona."
                "price": 50000
            }
            ```
        - Fields manatories
    - URL: http://restaurant-api.test/orden/{orden_id}
        - Example: http://restaurant-api.test/orden/41
    - Return: Order object updated (or error).
- Cancel order:
    - Method: DELETE
    - Body: Not required
    - URL: http://restaurant-api.test/orden/{orden_id}
        - Example: http://restaurant-api.test/orden/41
    - Return: Order object deleted (or error).
- Pay order (create Invoice):
    - Method: POST
    - Body:
        - Type: JSON
        - ```javascript
            {
                "paid": true
            }
            ```
        - Fields manatories
    - URL: http://restaurant-api.test/orden/{orden_id}
        - Example: http://restaurant-api.test/orden/41
    - Return: Order object with invoice "factura" updated (or error).