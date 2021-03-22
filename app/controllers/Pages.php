<?php
    class Pages {
        public function __construct(){
            echo 'this is Pages controller<br>';
        }

        public function index(){            // need to have an index method as 'default' if no other methods are present
            echo 'This is default index';
        }

        public function about(){
    
        }      
    }
  
?>    