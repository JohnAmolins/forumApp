<?php
# from Controller reach into Model, from Model reach into Database library
class User{
    private $db;

    public function __construct(){
        # initialize database with the created PDO
        $this->db = new Database;           // class is called 'Database' in 'libs' folder
    }
    # register user
    public function register($data){
        $this->db->query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)');
        #binding values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

    # if we do execute or delete, update User - call 'execute()' from Database libs
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }


    # find User by email
    public function findUserByEmail($email){            // passed in value is email to be searched in DB
        $this->db->query('SELECT * FROM users WHERE email = :email');            // calling method 'query' from 'Database' libs
        $this->db->bind(':email', $email);          // bind to the named parameter ':email' to that $email variable
        $row = $this->db->resultSingle();         // call single() method

        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }


}