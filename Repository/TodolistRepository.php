<?php

// kode query untuk aplikasi todolist
namespace Repository {

    use Model\Todolist;
    use PDO;

    // interface
    interface TodolistRepository
    {
        public function save(Todolist $todolist): void;
        public function remove(int $number): bool;
        public function showAll(): array;
    }

    // implements interface
    class TodolistRepositoryImpl implements TodolistRepository
    {
        // method koneksi ke database
        public function __construct(private PDO $connection)
        {
        }

        // method save
        public function save(Todolist $todo): void
        {
            // kode sql save
            $sql = "INSERT INTO todolist(todo) VALUES(?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$todo->getTodo()]);
        }

        // method remove
        public function remove(int $number): bool
        {

            // select id terlebih dahulu
            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            // pengecekan jumlah id di database
            if ($statement->fetch()) {
                // kode sql remove
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else {
                return false;
            }
        }

        public function showAll(): array
        {

            // kode sql show all
            $sql = "SELECT * FROM todolist";
            $statement = $this->connection->query($sql);
            $statement->execute();

            // iterasi data 
            $result = [];
            foreach($statement as $row){
                // membuat object Todolist
                $todolist = new Todolist();
                $todolist->setId($row["id"]); // set id
                $todolist->setTodo($row["todo"]); // set todo

                $result[] = $todolist;
            }
            return $result;
        }
    }
}
