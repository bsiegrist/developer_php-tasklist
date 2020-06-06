<?php
    class TaskRepository{
        
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
            $statement = DB::get()->prepare("SELECT * FROM task ORDER BY created DESC LIMIT 30");
            //execute
            $statement -> execute();
            //fetch
            $all = $statement->fetchAll();
            //return
            return $all;
        }

        public function deleteTask($id){
            //prepared statement
            $statement = DB::get()->prepare("DELETE FROM task WHERE id = :id");
            //execute
            $result = $statement -> execute(array(':id' => $id));
            //fehlermeldung, wenns nicht klappt
            if ($result){
                return $result;
            } 
            throw new Exception("konnte nicht löschen!");
        }

        public function saveTask($user_id, $status_id, $title, $description, $duration, $duedate){
            //prepared statement
            $statement = DB::get()->prepare(
                "INSERT INTO task(id, user_id, status_id, title, description, duration, duedate, created, updated) 
                VALUES (NULL, :userid, :statusid, :title, :description, :duration, :duedate, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);"
            );
            //execute
            $statement->execute([':userid' => $user_id, ':statusid' => $status_id, ':title' => $title, ':description' => $description, ':duration' => $duration, ':duedate' => $duedate]);
        }
    
        public function updateTask($id, $user_id, $status_id, $title, $description, $duration, $duedate){
            //prepared statement
            $statement = DB::get()->prepare(
                "UPDATE task SET user_id = :user_id, status_id = :status_id, title = :title, description = :description, duration = :duration, duedate = :duedate WHERE id = :id;"
            );
            //execute
            $statement->execute([':id' => $id, ':user_id' => $user_id, ':status_id' => $status_id, ':title' => $title, ':description' => $description, ':duration' => $duration, ':duedate' => $duedate]);
        }
    }
?>