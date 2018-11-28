<?php
$credentials = parse_ini_file('credentials.ini');
$mysqli = new mysqli($credentials['server'], $credentials['user'], $credentials['password'], $credentials['db']);
unset($credentials);
if ($mysqli->connect_error) {
    throw new Exception('DB connection problem.');
}