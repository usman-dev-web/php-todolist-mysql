<?php

require_once __DIR__ . "/../Config/Connection.php";

use \Config\Connection;
$config = Connection::getConnection();

echo "Sukses terhubung ke database" . PHP_EOL;

$config = null;