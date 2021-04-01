CREATE DATABASE pfile_server;
GRANT ALL PRIVILEGES ON pfile_server.* TO 'root'@'localhost';
UPDATE mysql.user SET plugin = 'mysql_native_password' WHERE user = 'root';
FLUSH PRIVILEGES;
