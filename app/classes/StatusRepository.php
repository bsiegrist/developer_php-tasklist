<?php
    class StatusRepository{

        public function getStatus(){
            //prepared statement
            $statement = DB::get()->prepare("SELECT * FROM status");
            //execute
            $statement -> execute();
            //fetch
            $stats = $statement->fetchAll();
            //return
            return $stats;
        }
    }
?>