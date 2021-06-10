<?php
//TODO remettre la base de données du site online
try {
//$bdd = new PDO('mysql:host=sql41.jnb1.host-h.net;dbname=bytesxayep_db1', 'bytesxayep_1', 'fqrevzbLWhKQhkAZREX8');
    $bdd = new PDO('mysql:host=localhost;dbname=evenst_table', 'root', '');
} catch (Exception $e) {
    die('Unable to connect to database.');
}
