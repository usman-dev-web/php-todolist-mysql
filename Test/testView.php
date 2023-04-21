<?php

require_once __DIR__ . "/../Config/Connection.php";
require_once __DIR__ . "/../Model/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../View/TodolistView.php";
require_once __DIR__ . "/../Utility/Input.php";

use \Config\Connection;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

// test show todo
function testViewShowTodo(){
    $connection = Connection::getConnection();
    $repository = new TodolistRepositoryImpl($connection);
    $service = new TodolistServiceImpl($repository);
    $view = new TodolistView($service);

    $view->viewShowTodo();
}
// testViewShowTodo();

// test view add todo
function testViewAddTodo(){
    $connection = Connection::getConnection();
    $repository = new TodolistRepositoryImpl($connection);
    $service = new TodolistServiceImpl($repository);
    $view = new TodolistView($service);
    $view->viewAddTodo();
    $view->viewShowTodo();
}
// testViewAddTodo();

// test view remove todo
function testViewRemoveTodo(){
    $connection = Connection::getConnection();
    $repository = new TodolistRepositoryImpl($connection);
    $service = new TodolistServiceImpl($repository);
    $view = new TodolistView($service);
    $view->viewRemoveTodo();
    $view->viewShowTodo();
}
testViewRemoveTodo();