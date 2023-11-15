DROP DATABASE if EXISTS capsan;
create database capsan;
CREATE USER if NOT EXISTS 'userCapSan'@'localhost' IDENTIFIED BY 'capibarasgod';
GRANT ALL PRIVILEGES ON capsan.* TO 'userCapSan'@'localhost';
FLUSH PRIVILEGES;
