<?php

require_once __DIR__ . "/../Config/Connection.php";
require_once __DIR__ . "/../Model/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Repository\TodolistRepositoryImpl;
use \Config\Connection;
use Service\TodolistServiceImpl;

// test add todo
function testAddTodolist(){
    $connection = Connection::getConnection();
    $repository = new TodolistRepositoryImpl($connection);
    $service = new TodolistServiceImpl($repository);
    $service->addTodolist("Belajar PHP Dasar");
    $service->addTodolist("Belajar PHP OOP");
    $service->addTodolist("Belajar PHP Database");
    
    // menutup koneksi
    $connection = null;
}
// testAddTodolist();

// test remove todo
function testRemoveTodolist(){
    $connection = Connection::getConnection();
    $repository = new TodolistRepositoryImpl($connection);
    $service = new TodolistServiceImpl($repository);
    $service->removeTodolist(5);
    
    // menutup koneksi
    $connection = null;
}
// testRemoveTodolist();

// test show all
function testShowAll(){
    $connection = Connection::getConnection();
    $repository = new TodolistRepositoryImpl($connection);
    $service = new TodolistServiceImpl($repository);
    $service->showTodo();
    
    // menutup koneksi
    $connection = null;
}
testShowAll();