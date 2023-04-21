<?php

// view untuk aplikasi todolist
namespace View {

    use PDO;
    use Service\TodolistService;


    class TodolistView
    {
        public function __construct(private TodolistService $service)
        {
        }

        public function viewShowTodo(): void
        {

            while (true) {

                // mengambil data todo dari database
                $this->service->showTodo();

                // menampilkan pilihan untuk user
                echo "LIST MENU'S" . PHP_EOL;
                echo "1. Add Todo" . PHP_EOL;
                echo "2. Remove Todo" . PHP_EOL;
                echo "x. Exit" . PHP_EOL;

                $input = \Utility\Input::input("Input Number Menu (x for cancel)");

                if ($input == "1") {
                    $this->viewAddTodo();
                } else if ($input == "2") {
                    $this->viewRemoveTodo();
                } else if ($input == "x") {
                    break;
                } else {
                    echo "Input Not Found" . PHP_EOL;
                }
            }

            echo "See U Again..." . PHP_EOL;
        }

        public function viewAddTodo(): void
        {
            echo "Add Todo" . PHP_EOL;
            $input = \Utility\Input::input("input todo (x for cancel)");
            if ($input == "x") {
                echo "Cancel Add Todo" . PHP_EOL;
            } else {
                $this->service->addTodolist($input);
            }
        }

        public function viewRemoveTodo(): void
        {
            echo "Remove Todo" . PHP_EOL;
            $input = \Utility\Input::input("input number todo (x for cancel)");
            if ($input == "x") {
                echo "Cancel Remove Todo" . PHP_EOL;
            } else {
                $this->service->removeTodolist($input);
            }
        }
    }
}
