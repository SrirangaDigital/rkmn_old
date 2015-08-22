#!/bin/sh

host='localhost';
db='rkmn';
usr='root';
pwd='mysql';

echo "drop database if exists rkmn; create database rkmn;" | /usr/bin/mysql -uroot -p$pwd

perl insert_books.pl $host $usr $pwd $db
