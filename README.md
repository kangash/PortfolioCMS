# MVC PortfolioCMS


# Installation
1. We clone the repository.
2. Extract the files to the root directory of the site.
3. Create a database and import into it dump cms.sql
4. In the files (admin(cms)\Config\database.php) we specify the connection parameters.


Example database.php
```
<?php
return [
    'host'     => 'localhost',
    'db_name'  => 'cms',
    'username' => 'root',
    'password' => '',
    'charset'  => 'utf8'
];
```
Admin route: /admin/

Insert admin

Email: admin@admin.com
Password: 1111

```
INSERT INTO user
(email, password, role, hash)
VALUES ('admin@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'admin', 'new')
```