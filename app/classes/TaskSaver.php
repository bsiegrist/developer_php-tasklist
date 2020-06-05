<?php

class TaskSaver{

    public function saveTask($user_id, $status_id, $title, $description, $duration, $duedate){
        $statement = DB::get()->prepare(
            "INSERT INTO task(id, user_id, status_id, title, description, duration, duedate, created, updated) 
            VALUES (NULL, :userid, :statusid, :title, :description, :duration, :duedate, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);"
        );

        $statement->execute([':userid' => $user_id, ':statusid' => $status_id, ':title' => $title, ':description' => $description, ':duration' => $duration, ':duedate' => $duedate]);
    }

    public function updateTask($id, $user_id, $status_id, $title, $description, $duration, $duedate){
        $statement = DB::get()->prepare(
            "UPDATE task SET user_id = :user_id, status_id = :status_id, title = :title, description = :description, duration = :duration, duedate = :duedate WHERE id = :id;"
        );

        $statement->execute([':id' => $id, ':user_id' => $user_id, ':status_id' => $status_id, ':title' => $title, ':description' => $description, ':duration' => $duration, ':duedate' => $duedate]);
    }
}


?>