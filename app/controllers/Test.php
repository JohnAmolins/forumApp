<?php
    class Test {
        public function __construct(){
            echo 'this is Test controller<br>';
            
        }
        public function index(){            // need to have an index method as 'default' if no other methods are present
            echo 'This is default index';
        }


        public function test($id){   // this is first method for Test controller ->  localhost/forumApp/test/test
            echo '<br>this is a test method<br>';
            echo 'parameter from url ->' . $id;
        }
         
    
       
    }

?>    