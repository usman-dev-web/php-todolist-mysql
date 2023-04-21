<?php

require_once __DIR__ . "/Config/Connection.php";
require_once __DIR__ . "/Model/Todolist.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/View/TodolistView.php";
require_once __DIR__ . "/Utility/Input.php";

// halaman utama aplikasi todolist

use \Config\Connection;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

$connection = Connection::getConnection();
$repository = new TodolistRepositoryImpl($connection);
$service = new TodolistServiceImpl($repository);
$view = new TodolistView($service);

echo "TODOLIST APPLICATION" . PHP_EOL;
$view->viewShowTodo();