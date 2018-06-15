<?php
    class Users extends Controller {
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'confirm' => $_POST['conpass'],
                    'name_error' => '',
                    'email_error' => '',
                    'pass_error' => '',
                    'conpass_error' => ''
                ];
                if(empty($data['email'])){
                    $data['email_error'] = 'Please enter email id!!';
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_error'] = 'Email already in use!';
                    }
                }
                if(empty($data['name'])){
                    $data['name_error'] = 'Please enter Your name!!';
                }
                if(empty($data['password'])){
                    $data['pass_error'] = 'Please enter a password';
                }elseif(strlen($data['password']) < 6){
                    $data['pass_error'] = 'Password must be at least 6 characters';
                }
                if(empty($data['confirm'])){
                    $data['conpass_error'] = 'Please confirm your password';
                }else{
                        if($data['confirm'] != $data['password']){
                        $data['conpass_error'] = 'Password mismatch! Please try again';
                    }
                }
                
                if(empty($data['name_error']) && empty($data['email_error']) && empty($data['pass_error']) && empty($data['conpass_error'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if($this->userModel->addUser($data)){
                        flash('register_success','You are now registered! You can now log in.');
                        redirect('users/login');
                    }else{
                        die('SOMETHING WENT WRONG!!');
                    }
                }else{
                    $this->view('users/register', $data);
                }
            }else{
                // init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm' => '',
                    'name_error' => '',
                    'email_error' => '',
                    'pass_error' => '',
                    'conpass_error' => ''
                ];
                
                $this->view('users/register', $data);
            }
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'email_error' => '',
                    'pass_error' => ''
                ];
                if(empty($data['email'])){
                    $data['email_error'] = 'Please enter email id!!';
                }

                if(empty($data['password'])){
                    $data['pass_error'] = 'Please enter password!!';
                }
                if($this->userModel->findUserByEmail($data['email'])){
                    
                }else{
                    flash('login_error','No User found!!','alert alert-danger');
                    $data['email_error'] = 'Please register first!';
                    $this->view('users/login', $data);
                }

                if(empty($data['email_error']) && empty($data['pass_error'])){
                    
                    $loggedInUser = $this->userModel->login($data['email'],$data['password']);

                    if($loggedInUser){
                        $this->createSession($loggedInUser);
                    }else{
                        $data['pass_error'] = 'Password Incorrect!!';
                        $this->view('users/login',$data);
                    }
                }else{
                    $this->view('users/login', $data);
                }
            }else{
                // init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_error' => '',
                    'pass_error' => ''
                ];
                
                $this->view('users/login', $data);
            }
        }
        public function createSession($user){
            session_start();
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->email;
            redirect('posts');
        }
        public function logout(){
            session_destroy();
            redirect('users/login');
        }
    }