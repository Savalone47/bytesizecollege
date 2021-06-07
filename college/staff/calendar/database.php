<?php
try {
$bdd = new PDO('mysql:host=sql41.jnb1.host-h.net;dbname=bytesxayep_db1', 'bytesxayep_1', 'fqrevzbLWhKQhkAZREX8');
} catch (Exception $e) {
    exit('Unable to connect to database.');
}
