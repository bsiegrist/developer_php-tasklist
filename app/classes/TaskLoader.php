<?php

    class TaskLoader{
        
        public function getOneByID($id){
            //prepared statement
            $statement = DB::get()->prepare("SELECT * FROM task WHERE id = :number");
            //execute
            $statement -> execute(array(':number' => $id));
            //fetch
            $one = $statement-> fetch();

            //wenns nicht existiert, dann null zurückgeben, sonst ausgeben
            if (empty($one)){
                return null;
            } else{
                return $one;
            }
        }

        public function getAll(){
            //prepared statement
            $statement = DB::get()->prepare("SELECT * FROM task LIMIT 50");
            //execute
            $statement -> execute();
            //fetch
            $all = $statement->fetchAll();
            //return
            return $all;
        }

    }


?>