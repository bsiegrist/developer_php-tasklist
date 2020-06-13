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


        public function getOneUser($username){
            //prepared statement
            $statement = DB::get()->prepare("SELECT * FROM user WHERE username = :username");
            //execute
            $statement -> execute(array(':username' => $username));
            //fetch
            $one = $statement-> fetch();

            //wenns nicht existiert, dann null zurückgeben, sonst ausgeben
            if (empty($one)){
                return null;
            } else{
                return $one;
            }
        }
    }
?>