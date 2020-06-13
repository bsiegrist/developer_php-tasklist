<?php

    class UserRepository{
        
        public function getUsers(){
            //prepared statement
            $statement = DB::get()->prepare("SELECT * FROM user");
            //execute
            $statement -> execute();
            //fetch
            $users = $statement->fetchAll();
            //return
            return $users;
        }

        public function createUser($form){
            //prepared statement
            $statement = DB::get()->prepare("INSERT INTO user (username, lastname, name, password) VALUES (:username, :lastname, :name, :password)");
            //execute
            $statement->execute($form);
        }


        /*
        public function userLogin($form){
            //prepared statement
            $statement = DB::get()->prepare("SELECT username, password from user WHERE username = :username AND password = :password");
            //execute
            $result = $statement->execute($form);
            if ($result){
                echo "result aus userrepo: " $result;
                return $result;
            } 
            throw new Exception("login falsch!");
        }
        */
    }
?>