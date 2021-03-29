<?php
    class Users extends Controller{
        public function __construct(){

        }
        # to register new users - loads register form, submits register form
        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ // check if incoming method is 'POST' METHOD
                // sanitize POST strings before data processing
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);                
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_error' => '', // if user has put incorrect data it should be displayed
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];


                if(empty($data['email'])){ // if subbmited emailis empty
                    $data['email_error'] = 'Please enter email';
                }
                if(empty($data['name'])){ // 
                    $data['name_error'] = 'Please enter valid name';
                }
                if(empty($data['password'])){ 
                    $data['password_error'] = 'Please enter password';
                }elseif(strlen($data['password'])<6){
                    $data['password_error'] = 'Password too short. Must be 6 characters.';
                }
                if(empty($data['confirm_password'])){ 
                    $data['confirm_password_error'] = 'Please confirm password!';
                }else{
                    if($data['password'] != ['confirm_password']){
                        $data['confirm_password_error'] = 'Passwords do not match.';
                    }
                }

                # check if error variables are empty
                if(empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error'])  && empty($data['confirm_password_error'])){
                    die('Success!');
                } else {
                    # load view with errors
                    $this->view('users/register', $data);
                }




            } else{ // load 'blak' register form if it's not 'POST' request; save data if user has entered any data
                $data = [
                    'name' => '',
                    'email' =>'',
                    'password' => '',
                    'confirm_password' => '',
                    'name_error' => '', // if user has put incorrect data it should be displayed
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];

                $this->view('users/register', $data);
            }
        }

        # login form
        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ // check if incoming method is 'POST' METHOD
                # process the login form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);                
                $data = [
                    
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_error' => '',
                    'password_error' => '',
                ];

                if(empty($data['email'])){ // if subbmited emailis empty
                    $data['email_error'] = 'Please enter email';
                }

                if(empty($data['password'])){ // if subbmited emailis empty
                    $data['password_error'] = 'Please enter password';
                }

                # checking error fields

                if(empty($data['email_error']) && empty($data['password_error'])){
                    die('Logded in');
                } else {
                    # load view with errors
                    $this->view('users/login', $data);
                }

            } else{ // load 'blak' register form if it's not 'POST' request; save data if user has entered any data
                $data = [
                    'email' =>'',
                    'password' => '',
                    'email_error' => '',
                    'password_error' => '',
                ];

                $this->view('users/login', $data);
            }
        }

    }