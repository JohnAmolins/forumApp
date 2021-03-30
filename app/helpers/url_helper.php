<?php
# page redirect method
  function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
  }