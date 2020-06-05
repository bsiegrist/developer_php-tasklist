<?php

class TaskSaver{

    public function saveTask($user_id, $status_id, $title, $description, $duration, $duedate){
        $statement = DB::get()->prepare("INSERT INTO task(id, user_id, status_id, title, description, duration, duedate, created, updated) 
        VALUES (NULL, :userid, :statusid, :title, :description, :duration, :duedate, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");

        $statement->execute([':userid' => $user_id, ':statusid' => $status_id, ':title' => $title, ':description' => $description, ':duration' => $duration, ':duedate' => $duedate]);
    }

    public function updateTask($id, $user_id, $status_id, $title, $description, $duration, $duedate){
        $statement = DB::get()->prepare("UPDATE task SET id = :id, user_id = :userid, status_id = :statusid, title = :title, description = :description, duration = :duration, duedate = :duedate, updated = CURRENT_TIMESTAMP);");

        $statement->execute([':id' => $id, ':userid' => $user_id, ':statusid' => $status_id, ':title' => $title, ':description' => $description, ':duration' => $duration, ':duedate' => $duedate]);
    }
}


?>