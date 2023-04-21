<?php

// representasi table dari database
namespace Model{
    class Todolist{
        public function __construct(private ?int $id = null, private ?string $todo = null )
        {
            
        }

        // get id
        public function getId(){
            return $this->id;
        }

        // set id
        public function setId(int $id){
            $this->id = $id;
        }

        // get todo
        public function getTodo(){
            return $this->todo;
        }

        // set Todo
        public function setTodo(string $todo){
            $this->todo = $todo;
        }
    }
}