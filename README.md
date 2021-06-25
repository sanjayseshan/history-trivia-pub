# history-trivia-pub

Some setup notes:
* Requires a Linux server with apache2, php, mysql
* Needs to be placed in the root server directory
* index.php, register.php need to have reCaptcha keys added
* config.php needs to have the mysql database linked

mysql instructions:
```
>> CREATE DATABASE fchc;
>> USE fchc;
>> CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```
