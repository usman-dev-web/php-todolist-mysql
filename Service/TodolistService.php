<?php

// service aplikasi todolist
namespace Service {

    use PDO;
    use Repository\TodolistRepository;
    use Model\Todolist;

    interface TodolistService
    {
        public function showTodo(): void;
        public function addTodolist(string $todo): void;
        public function removeTodolist(int $number): void;
    }

    // implements interface
    class TodolistServiceImpl implements TodolistService
    {


        public function __construct(private TodolistRepository $repository)
        {
            $this->repository = $repository;
        }

        public function showTodo(): void
        {
            $todolist = $this->repository->showAll();
            // iterasi todolist
            foreach ($todolist as $value) {
                echo $value->getId() .". " . $value->getTodo() . PHP_EOL;
            }
        }

        public function addTodolist(string $todo): void
        {
            $todolist = new Todolist(todo: $todo);
            $this->repository->save($todolist);

            // tampilkan pesan sukses menambah todo
            echo "Success Add New Todo" . PHP_EOL;
        }

        public function removeTodolist(int $number): void
        {
            // cek jumlah todo
            if ($this->repository->remove(number: $number)) {
                echo "Success Remove todo no. $number" . PHP_EOL;
            } else {
                echo "Todo no. $number not found" . PHP_EOL;
            }
        }
    }
}
