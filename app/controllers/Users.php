<?php
    class Users extends Controller{
        public function __construct(){

        }
        # to register new users - loads register form, submits register form
        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ // check if incoming method is 'POST' METHOD

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



    }