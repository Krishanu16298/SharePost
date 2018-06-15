<?php
    class User {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email',$email);

            $this->db->single();

            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function getUserById($id){
            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id',$id);

            $row = $this->db->single();

            return $row;
        }

        public function login($email, $password){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_pass = $row->password;
            if(password_verify($password, $hashed_pass)){
                return $row;
            }else{
                return false;
            }
        }

        public function addUser($data){
            $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }