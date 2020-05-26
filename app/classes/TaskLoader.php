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

        /*
        public function getOneByIDAndUser($id){
            //prepared statement
            $statement = DB::get()->prepare("SELECT * FROM task WHERE id = :number LEFT JOIN user ON task.user_id = user.id");
            //execute
            $statement -> execute(array(':number' => $id));
            //fetch
            $oneWithUser = $statement-> fetch();

            //wenns nicht existiert, dann null zurückgeben, sonst ausgeben
            if (empty($oneWithUser)){
                return null;
            } else{
                return $oneWithUser;
            }
        }
        */

    }


?>