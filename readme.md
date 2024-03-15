************
Installation
************

Install XAMPP Server and run as administrator.
Clone the repository.

Copy the repository and paste it into the XAMPP's "htdocs" directory.

![htdocs folder](https://i.imgur.com/Xmi3EsU.png)

![crudci](https://i.imgur.com/03dhMvG.png)



In phpMyAdmin, create a database called 'crud' with the collation 'utf8_general_ci'.
Run the following SQL commands from 'crudci.sql' in the SQL tab.

The commands in 'crudci.sql' will create an empty database.

when everything is done and you have the Mysql and apache running properly

![xampp](https://i.imgur.com/t7goAV5.png)

type http://localhost/crudci/dashboard

You will be redirected to a login page.

The first time you log in, click on 'don't have an account' and then sign in and log in normally.

Make sure you have ports 3306, 80, and 443 open.


if you are having trouble in phpMyAdmin access, click in my.init
![myinit] (https://i.imgur.com/7Ifm9nc.png)

then put skip-grant-tables
![xampp] (https://i.imgur.com/qIF3ZCJ.png)




